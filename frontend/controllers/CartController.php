<?php

namespace frontend\controllers;


use common\models\CartItem;
use common\models\Order;
use common\models\OrderAddress;
use common\models\Product;
// use PayPalCheckoutSdk\Core\PayPalHttpClient;
// use PayPalCheckoutSdk\Core\SandboxEnvironment;
// use PayPalCheckoutSdk\Orders\OrdersGetRequest;
use Yii;
use yii\filters\ContentNegotiator;
use yii\filters\VerbFilter;
use yii\helpers\VarDumper;
use yii\web\BadRequestHttpException;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\web\UploadedFile;
use common\models\UserAddress;
use backend\models\Ongkir;
use yii\helpers\ArrayHelper;


/**
 * Class CartController
 *
 * @author  Zura Sekhniashvili <zurasekhniashvili@gmail.com>
 * @package frontend\controllers
 */
class CartController extends \frontend\base\Controller
{
    public function behaviors()
    {
        return [
            [
                'class' => ContentNegotiator::class,
                'only' => ['add', 'create-order', 'submit-payment', 'change-quantity'],
                'formats' => [
                    'application/json' => Response::FORMAT_JSON,
                ],
            ],
            [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['POST', 'DELETE'],
                    'create-order' => ['POST'],
                ]
            ]
        ];
    }

    public $success = false;

    public function actionIndex()
    {
        $cartItems = CartItem::getItemsForUser(currUserId());
        $user = Yii::$app->user->identity;
        $userAddress = $user->getAddress();

        $pro = Ongkir::find()->All();
        $pro = ArrayHelper::map($pro, 'id_ongkir', 'Provinsi');

        // echo '<pre>';
        // print_r ($pro);
        // die();

        // // $prov = new Ongkir();
        // $ua = UserAddress::find()
        //     ->alias('u')
        //     ->andWhere(['u.user_id' => $userAddress])
        //     ->all('state');
       
        // echo '<pre>';
        // print_r($userAddress->state);
        // die();
        
        // $prov = $userAddress->
// echo '<pre>';
//         print_r($success);
//         die();
        return $this->render('index', [
            'items' => $cartItems,
            'user' => $user,
            'userAddress' => $userAddress,
            'success' => $success,
            'pro' => $pro,
        ]);
    }

    public function actionAdd()
    {
        $id = \Yii::$app->request->post('id');
        $product = Product::find()->id($id)->published()->one();
               
        if (!$product) {
            throw new NotFoundHttpException("Product does not exist");
        }

        if (\Yii::$app->user->isGuest) {

            $cartItems = \Yii::$app->session->get(CartItem::SESSION_KEY, []);
            $found = false;
            foreach ($cartItems as &$item) {
                if ($item['id'] == $id) {
                    $item['quantity']++;
                    $found = true;
                    break;
                }
            }
            if (!$found) {
                $cartItem = [
                    'id' => $id,
                    'name' => $product->name,
                    'image' => $product->image,
                    'price' => $product->price,
                    'quantity' => 1,
                    'total_price' => $product->price
                ];
                $cartItems[] = $cartItem;
            }

            \Yii::$app->session->set(CartItem::SESSION_KEY, $cartItems);
        } else {
            $userId = \Yii::$app->user->id;
            $cartItem = CartItem::find()->userId($userId)->productId($id)->one();
            if ($cartItem) {
                $cartItem->quantity++;
            } else {
                $cartItem = new CartItem();
                $cartItem->product_id = $id;
                $cartItem->created_by = $userId;
                $cartItem->quantity = 1;
            }
            if ($cartItem->save()) {
                return [
                    'success' => true
                ];
            } else {
                return [
                    'success' => false,
                    'errors' => $cartItem->errors
                ];
            }
        }
    }

    public function actionDelete($id)
    {
        if (isGuest()) {
            $cartItems = \Yii::$app->session->get(CartItem::SESSION_KEY, []);
            foreach ($cartItems as $i => $cartItem) {
                if ($cartItem['id'] == $id) {
                    array_splice($cartItems, $i, 1);
                    break;
                }
            }
            \Yii::$app->session->set(CartItem::SESSION_KEY, $cartItems);
        } else {
            CartItem::deleteAll(['product_id' => $id, 'created_by' => currUserId()]);
        }

        return $this->redirect(['index']);
    }

    public function actionChangeQuantity()
    {
        $id = \Yii::$app->request->post('id');
        $product = Product::find()->id($id)->published()->one();
        if (!$product) {
            throw new NotFoundHttpException("Product does not exist");
        }
        $quantity = \Yii::$app->request->post('quantity');
        if (isGuest()) {
            $cartItems = \Yii::$app->session->get(CartItem::SESSION_KEY, []);
            foreach ($cartItems as &$cartItem) {
                if ($cartItem['id'] === $id) {
                    $cartItem['quantity'] = $quantity;
                    break;
                }
            }
            \Yii::$app->session->set(CartItem::SESSION_KEY, $cartItems);
        } else {
            $cartItem = CartItem::find()->userId(currUserId())->productId($id)->one();
            if ($cartItem) {
                $cartItem->quantity = $quantity;
                $cartItem->save();
            }
        }

        return [
            'quantity' => CartItem::getTotalQuantityForUser(currUserId()),
            'price' => Yii::$app->formatter->asCurrency(CartItem::getTotalPriceForItemForUser($id, currUserId()))
        ];
    }

    public function actionCheckout()
    {
        $cartItems = CartItem::getItemsForUser(currUserId());
        $productQuantity = CartItem::getTotalQuantityForUser(currUserId());
        $totalPrice = CartItem::getTotalPriceForUser(currUserId());

        $user = Yii::$app->user->identity;
        $userAddress = $user->getAddress();

        $pro = Ongkir::find()->All();
        $pro = ArrayHelper::map($pro, 'id_ongkir', 'Provinsi');
       

        // $p = $userAddress->getProv();
        // echo '<pre>';
        // print_r($userAddress->provinsi);
        // die();
        $ong = Ongkir::find()
                // ->select('total_ongkir')
                ->alias('o')
                ->select('total_ongkir')
                ->andWhere(['o.id_ongkir'=> $userAddress->provinsi])
                ->scalar();

        
        $sumTotal = $totalPrice + $ong;
        $success = false;
        // echo '<pre>';
        // print_r($ong);
        // die();

        if (empty($cartItems)) {
            return $this->redirect([Yii::$app->homeUrl]);
        }
        $order = new Order();

        $order->total_price = $sumTotal;
        $order->total_ongkir = $ong;
        $order->status = Order::STATUS_DRAFT;
        $order->created_at = time();
        $order->created_by = currUserId();

        $order->imageFile = UploadedFile::getInstance($order, 'imageFile');
        
        $transaction = Yii::$app->db->beginTransaction();
        if ($order->load(Yii::$app->request->post())
            && $order->save()
            // && $order->saveAddress(Yii::$app->request->post())
            && $order->saveOrderItems()){
            $transaction->commit();
            

            $state = Ongkir::find()
            ->select('Provinsi')
            ->alias('o')
            ->andWhere(['o.id_ongkir' => $userAddress->provinsi])
            ->scalar();
            $orderAddress = new OrderAddress();
            $orderAddress->order_id = $order->id;
            $orderAddress->address = $userAddress->address;
            $orderAddress->city = $userAddress->city;
            $orderAddress->state = $state;
            $orderAddress->country = $userAddress->country;
            $orderAddress->zipcode = $userAddress->zipcode;
            $orderAddress->save();
        // echo '<pre>';
        //     print_r($order->id);
        //     die();
            CartItem::clearCartItems(currUserId());

            return $this->render('_form', [
                'order' => $order,
            ]);
        }

        // $user = Yii::$app->user->identity;
        //     $userAddress = $user->getAddress();
        // $ong = new \backend\models\ongkir();

        $orderAddress = new OrderAddress();
        if (!isGuest()) {
            /** @var \common\models\User $user */
            $user = Yii::$app->user->identity;
            $userAddress = $user->getAddress();

            $state = Ongkir::find()
                    ->select('Provinsi')
                    ->alias('o')
                    ->andWhere(['o.id_ongkir' => $userAddress->provinsi])
                    ->scalar();

                    // echo '<pre>';
                    // print_r($state);
                    // die();

            $order->firstname = $user->firstname;
            $order->lastname = $user->lastname;
            $order->email = $user->email;
            $order->status = Order::STATUS_DRAFT;

            $orderAddress->address = $userAddress->address;
            $orderAddress->city = $userAddress->city;
            $orderAddress->state = $state;
            $orderAddress->country = $userAddress->country;
            $orderAddress->zipcode = $userAddress->zipcode;
        }

        if($ong != null){
            return $this->render('checkout', [
                'order' => $order,
                'orderAddress' => $orderAddress,
                'cartItems' => $cartItems,
                'productQuantity' => $productQuantity,
                'totalPrice' => $totalPrice,
                'ong' => $ong,
                'sumTotal' => $sumTotal,
                'pro' => $pro,
            ]);
        }else{
            $success = true;
            return $this->render('checkout', [
                'order' => $order,
                'orderAddress' => $orderAddress,
                'cartItems' => $cartItems,
                // 'productQuantity' => $productQuantity,
                // 'totalPrice' => $totalPrice,
                // 'ong' => $ong,
                // 'sumTotal' => $sumTotal,
                'success' => $success,
            ]);
        }
    }

    // public function action_Form(){
    //     if(Yii::$app->request->post){
    //         Order::clearOrders(currUserId());
    //     }
    //     return $this->render('_form');
        
    // }

    // public function actionSubmitPayment($orderId)
    // {
    //     $where = ['id' => $orderId, 'status' => Order::STATUS_DRAFT];
    //     if (!isGuest()){
    //         $where['created_by'] = currUserId();
    //     }
    //     $order = Order::findOne($where);
    //     if (!$order){
    //         throw new NotFoundHttpException();
    //     }

    //     $req = Yii::$app->request;
    //     $paypalOrderId = $req->post('orderId');
    //     $exists = Order::find()->andWhere(['paypal_order_id' => $paypalOrderId])->exists();
    //     if ($exists) {
    //         throw new BadRequestHttpException();
    //     }

    //     $environment = new SandboxEnvironment(Yii::$app->params['paypalClientId'], Yii::$app->params['paypalSecret']);
    //     $client = new PayPalHttpClient($environment);

    //     $response = $client->execute(new OrdersGetRequest($paypalOrderId));

    //     // @TODO Save the response information in logs
    //     if ($response->statusCode === 200) {
    //         $order->paypal_order_id = $paypalOrderId;
    //         $paidAmount = 0;
    //         foreach ($response->result->purchase_units as $purchase_unit) {
    //             if ($purchase_unit->amount->currency_code === 'EUR') {
    //                 $paidAmount += $purchase_unit->amount->value;
    //             }
    //         }
    //         if ($paidAmount === (float)$order->total_price && $response->result->status === 'COMPLETED') {
    //             $order->status = Order::STATUS_PAID;
    //         }
    //         $order->transaction_id = $response->result->purchase_units[0]->payments->captures[0]->id;
    //         if  ($order->save()) {
    //             if (!$order->sendEmailToVendor()) {
    //                 Yii::error("Email to the vendor is not sent");
    //             }
    //             if (!$order->sendEmailToCustomer()) {
    //                 Yii::error("Email to the customer is not sent");
    //             }

    //             return [
    //                 'success' => true
    //             ];
    //         } else {
    //             Yii::error("Order was not saved. Data: ".VarDumper::dumpAsString($order->toArray()).
    //                 '. Errors: '.VarDumper::dumpAsString($order->errors));
    //         }
    //     }

    //     throw new BadRequestHttpException();

    //     // todo Validate the transaction ID. It must not be used and it must be valid transaction ID in paypal.
    // }
}