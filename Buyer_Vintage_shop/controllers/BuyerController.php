<?php 
require_once './models/Buyer.php';
use models\Buyer;
class BuyerController
{
    private $buyerModel;

    public function __construct($dbConnection)
    {
        $this->buyerModel = new Buyer($dbConnection);
    }

    public function register($postData)
    {

        if (isset($postData['first_name'], $postData['last_name'], $postData['email'], $postData['password'])) {

            $data = [
                'first_name' => $postData['first_name'],
                'last_name' => $postData['last_name'],
                'email' => $postData['email'],
                'password' => $postData['password'],
                'phone' => $postData['phone'] ?? '',
                'address' => $postData['address'] ?? '',
                'city' => $postData['city'] ?? '',
                'country' => $postData['country'] ?? '',
                'postal_code' => $postData['postal_code'] ?? '',
                'shipping_address' => $postData['shipping_address'] ?? '',
                'user_type' => $postData['user_type'] ?? 'buyer'
            ];

            return $this->buyerModel->register($data);
        }

        return json_encode([
            'status' => 'error',
            'message' => 'Missing required fields.'
        ]);
    }
}
?>
