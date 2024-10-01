<?php

require_once 'BaseModel.php';

class UserModel extends BaseModel {

    public function findUserById($id) {
        $sql = 'SELECT * FROM users WHERE id = '.$id;
        $user = $this->select($sql);

        return $user;
    }

    public function findUser($keyword) {
        $sql = 'SELECT * FROM users WHERE user_name LIKE %'.$keyword.'%'. ' OR user_email LIKE %'.$keyword.'%';
        $user = $this->select($sql);

        return $user;
    }
/**
 * Authentication user
 * @param $userName
 * @param $password
 * @return array|null
 */
public function auth($userName, $password) {
    // Sử dụng prepared statement để tránh SQL Injection
    $sql = 'SELECT * FROM users WHERE name = ?';
    $stmt = self::$_connection->prepare($sql);
    $stmt->bind_param('s', $userName);
    $stmt->execute();
    $result = $stmt->get_result();
    
    // Kiểm tra xem người dùng có tồn tại không
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Sử dụng password_verify để kiểm tra mật khẩu đã băm
        if (password_verify($password, $user['password'])) {
            return $user; // Đăng nhập thành công
        } else {
            return null; // Mật khẩu sai
        }
    }

    return null; // Người dùng không tồn tại
}


   /**
 * Delete user by id
 * @param $id
 * @return mixed
 */
public function deleteUserById($id) {
    $sql = 'DELETE FROM users WHERE id = ?';
    $stmt = self::$_connection->prepare($sql);
    $stmt->bind_param('i', $id);
    return $stmt->execute();
}


    /**
     * Update user
     * @param $input
     * @return mixed
     */
  public function updateUser($input) {
    if (!isset($input['version'])) {
        return ['error' => 'Version not provided.'];
    }

    $version = $input['version'];
    $id = $input['id'];

    // Kiểm tra phiên bản hiện tại trong CSDL trước khi cập nhật
    $currentUser = $this->findUserById($id);
    if ($currentUser[0]['version'] != $version) {
        return ['error' => 'Dữ liệu đã được thay đổi bởi người khác. Vui lòng tải lại trang.'];
    }

    // Tăng version sau khi cập nhật
    $newVersion = $version + 1;

    // Xử lý SQL update với kiểm tra version
    $sql = 'UPDATE users SET 
             name = "' . mysqli_real_escape_string(self::$_connection, $input['name']) . '", 
             password="' . md5($input['password']) . '", 
             version=' . $newVersion . ' 
            WHERE id = ' . $id . ' AND version = ' . $version;

    $result = $this->update($sql);

    if ($result) {
        return ['success' => 'User updated successfully.'];
    } else {
        return ['error' => 'Cập nhật thất bại.'];
    }
}


   /**
 * Insert user
 * @param $input
 * @return mixed
 */
public function insertUser($input) {
    $hashedPassword = password_hash($input['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (name, password) VALUES (?, ?)";
    $stmt = self::$_connection->prepare($sql);
    $stmt->bind_param('ss', $input['name'], $hashedPassword);

    $result = $stmt->execute();
    return $result ? $stmt->insert_id : false;
}


    /**
     * Search users
     * @param array $params
     * @return array
     */
    public function getUsers($params = []) {
        //Keyword
        if (!empty($params['keyword'])) {
            $sql = 'SELECT * FROM users WHERE name LIKE "%' . $params['keyword'] .'%"';

            //Keep this line to use Sql Injection
            //Don't change
            //Example keyword: abcef%";TRUNCATE banks;##
            $users = self::$_connection->multi_query($sql);

            //Get data
            $users = $this->query($sql);
        } else {
            $sql = 'SELECT * FROM users';
            $users = $this->select($sql);
        }

        return $users;
    }
}