<? 
function getDBConnection() {


    $conn = new mysqli("localhost", "root", "", "products");

    if ($conn->connect_error) {
        echo "Ошибка подключения базы данных!";
        exit();
    }

    return $conn;
}

function getAllProducts() {
    $conn = getDBConnection();
    $sql = "SELECT * FROM products";
    $result = $conn->query($sql);
    $products = [];

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $products[] = $row;
        }
    }

    $conn->close();
    return $products;
}

function getProductById($id) {
    $conn = getDBConnection();
    $stmt = $conn->prepare("SELECT * FROM products WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $product = $result->fetch_assoc();
    
    $stmt->close();
    $conn->close();
    return $product;
}

function deleteProduct($id) {
    $conn = getDBConnection();
    $stmt = $conn->prepare("DELETE FROM products WHERE id = ?");
    $stmt->bind_param("i", $id);
    $success = $stmt->execute();
    
    $stmt->close();
    $conn->close();
    return $success;
}

function createProduct($name, $category, $price, $discount) {
    $conn = getDBConnection();
    $stmt = $conn->prepare("INSERT INTO products (name, category, price, discount) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssdd", $name, $category, $price, $discount);
    $success = $stmt->execute();
    
    $stmt->close();
    $conn->close();
    return $success;
}

function updateProduct($id, $name, $category, $price, $discount) {
    $conn = getDBConnection();
    $stmt = $conn->prepare("UPDATE products SET name = ?, category = ?, price = ?, discount = ? WHERE id = ?");
    $stmt->bind_param("ssddi", $name, $category, $price, $discount, $id);
    $success = $stmt->execute();
    
    $stmt->close();
    $conn->close();
    return $success;
}
?>
