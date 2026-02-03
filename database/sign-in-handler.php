    <?php
    ini_set('display_errors', 0);
    ini_set('display_startup_errors', 0);
    error_reporting(E_ALL);
    ini_set('log_errors', 1);
    ini_set('error_log', __DIR__ . '/auth_errors.log');

    session_start();
    header('Content-Type: application/json');

    // Connect to database
    require_once(__DIR__ . '/database-connect.php'); // this must define $connection

    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        http_response_code(405);
        echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
        exit;
    }

    if (empty($_POST['usernameOrEmail']) || empty($_POST['loginPassword'])) {
        http_response_code(400);
        echo json_encode(['status' => 'error', 'message' => 'All fields are required']);
        exit;
    }

    $identifier = trim($_POST['usernameOrEmail']);
    $password = $_POST['loginPassword'];

    try {
        $isEmail = filter_var($identifier, FILTER_VALIDATE_EMAIL);
        $query = "SELECT residentID, username, email, passwordHash, isVerified
                FROM residents 
                WHERE " . ($isEmail ? "email = :identifier" : "username = :identifier");

        $stmt = $connection->prepare($query);
        $stmt->bindValue(':identifier', $identifier, PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user || (
        !password_verify($password, $user['passwordHash']) &&
        $password !== $user['passwordHash'] // fallback to plain comparison
    )) {
        http_response_code(401);
        echo json_encode(['status' => 'error', 'message' => 'Invalid username/email or password']);
        exit;
    }


        // Set session data
        $_SESSION['user_id'] = $user['residentID'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['is_verified'] = $user['isVerified'];

        switch ((int)$user['isVerified']) {
            case 0:
            case 1:
                $redirectPath = '/Barangay-System/pages/home.php';
                break;
            case 2:
                $redirectPath = '/Barangay-System/pages/home.php';
                break;
            case 3:
                $redirectPath = '/Barangay-System/pages/home.php';
                break;
            default:
                http_response_code(403);
                echo json_encode(['status' => 'error', 'message' => 'Unknown access level']);
                exit;
        }

        echo json_encode([
            'status' => 'success',
            'redirectPath' => $redirectPath
        ]);
    } catch (Exception $error) {
        error_log("Authentication error: " . $error->getMessage());
        http_response_code(500);
        echo json_encode(['status' => 'error', 'message' => 'Authentication service unavailable']);
    }
    ?>