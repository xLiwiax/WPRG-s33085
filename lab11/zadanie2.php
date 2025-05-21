<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>zadanie2</title>
</head>
<body>
    <?php
        class Product {
            private string $name;
            private float $price;
            private int $quantity;

            public function __construct(string $name, float $price, int $quantity) {
                $this->name = $name;
                $this->price = $price;
                $this->quantity = $quantity;
            }
            ////////////////////////////////////////////////////////////
            public function getName(): string { return $this->name; }
            public function getPrice(): float { return $this->price; }
            public function getQuantity(): int { return $this->quantity; }

            public function setName(string $name): void { $this->name = $name; }
            public function setPrice(float $price): void { $this->price = $price; }
            public function setQuantity(int $quantity): void { $this->quantity = $quantity; }
            ////////////////////////////////////////////////////////////
            public function __toString(): string {
                return "Product: {$this->name}, Price: {$this->price}, Quantity: {$this->quantity}";
            }
        }

       
        class Cart {
            /** @var Product[] */
            private array $products;

            public function __construct() {
                $this->products = [];
            }

            public function addProduct(Product $product): void {
                $this->products[] = $product;
            }

            public function removeProduct(Product $product): void {
                foreach ($this->products as $index => $p) {
                    if ($p->getName() === $product->getName()) {
                        unset($this->products[$index]);
                        break;
                    }
                }
            }

            public function getTotal(): float {
                $total = 0.0;
                foreach ($this->products as $product) {
                    $total += $product->getPrice() * $product->getQuantity();
                }
                return $total;
            }

            public function __toString(): string {
                $output = "Products in cart:\n";
                foreach ($this->products as $product) {
                    $output .= $product . "\n";
                }
                $output .= "Total price: " . $this->getTotal();
                return $output;
            }
        }
        ///////////////////////////////////////
        $product1 = new Product("Laptop", 1500, 1);
        $product2 = new Product("pc", 50000, 2);

        $cart = new Cart();
        $cart->addProduct($product1);
        $cart->addProduct($product2);
        echo $cart;

        echo    "<br><hr>";

        $cart->removeProduct($product2);
        echo $cart;
    ?>
</body>
</html>