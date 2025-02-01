<?php
namespace models;

class Cart {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    // Get cart items from the session and fetch product details from the database
    public function getCartItems($cartSession) {
        $cartItems = [];
        $totalPrice = 0;

        if (!empty($cartSession)) {
            foreach ($cartSession as $cartItem) {
                // Fetch product details from the database
                $stmt = $this->conn->prepare("SELECT id, name, price FROM products WHERE id = ?");
                $stmt->bind_param("i", $cartItem['id']);
                $stmt->execute();
                $result = $stmt->get_result();
                $product = $result->fetch_assoc();

                if ($product) {
                    $product['quantity'] = $cartItem['quantity'];
                    $cartItems[] = $product;
                    $totalPrice += $product['price'] * $cartItem['quantity'];
                }
            }
        }

        return ['items' => $cartItems, 'totalPrice' => $totalPrice];
    }


    // Clear the cart
    public function clearCart() {
        unset($_SESSION['cart']);
    }



    public static function addToCart($productId, $quantity) {
        // Initialize the cart if not already done
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        // Check if product is already in the cart
        $productFound = false;
        foreach ($_SESSION['cart'] as &$cartItem) {
            if ($cartItem['id'] == $productId) {
                $cartItem['quantity'] += $quantity; // Update quantity
                $productFound = true;
                break;
            }
        }

        // If product is not found in the cart, add it
        if (!$productFound) {
            $_SESSION['cart'][] = [
                'id' => $productId,
                'quantity' => $quantity
            ];
        }
    }
}
?>
