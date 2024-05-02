<?php
require_once "db.php";

class Model extends Db
{


    /** USER */
    public function GetDataUser()
    {
        $sql = "SELECT * FROM user";
        $con = $this->connect();
        $ketqua = $con->query($sql);

        if ($ketqua->num_rows == 0) {
            $data = 0;
        } else {
            while ($datas = mysqli_fetch_assoc($ketqua)) {
                $data[] = $datas;
            }
        }
        return $data;
    }
    public function GetDataUserDetail($username)
    {
        $sql = "SELECT * FROM user WHERE username = '$username' ";
        $con = $this->connect();
        $result = $con->query($sql);
        if ($result->num_rows == 0) {
            $data = 0;
        } else {
            while ($datas = mysqli_fetch_assoc($result)) {
                $data = $datas;
            }
        }
        return $data;
    }
    public function GetDataUserRole()
    {
        $sql = "SELECT * FROM role_user";
        $con = $this->connect();
        $ketqua = $con->query($sql);

        if ($ketqua->num_rows == 0) {
            $data = 0;
        } else {
            while ($datas = mysqli_fetch_assoc($ketqua)) {
                $data[] = $datas;
            }
        }
        return $data;
    }
    public function RegisterUser($user, $pass, $mail, $who)
    {
        $sql = "INSERT INTO user(id, username, pass, email, id_role, id_job, id_cv) VALUES(NULL,'$user', '$pass','$mail', '$who', NULL, NULL)";
        $conn = $this->connect();
        return $conn->query($sql);
    }
    public function ChangePass($user, $pass)
    {
        $sql = "UPDATE user SET pass = '$pass' WHERE username = '$user'";
        $conn = $this->connect();
        return $conn->query($sql);
    }
    public function UpdateInfor($user, $phone_number, $company, $address)
    {
        $sql = "UPDATE user SET phone_number = '$phone_number', company='$company', address='$address'  WHERE username = '$user'";
        $conn = $this->connect();
        return $conn->query($sql);
    }




    /* CATEGORIES */
    public function GetAllCategories()
    {
        $sql = "SELECT * FROM categories";
        $con = $this->connect();
        $result = $con->query($sql);
        if ($result->num_rows == 0) {
            $data = 0;
        } else {
            while ($datas = mysqli_fetch_assoc($result)) {
                $data[] = $datas;
            }
        }
        return $data;
    }
    public function AddCategory($title, $img)
    {
        $sql = "INSERT INTO categories(id, title, img) VALUES(NULL,'$title', '$img')";
        $conn = $this->connect();
        return $conn->query($sql);
    }
    public function UpdateCategory($id_cate, $title, $img)
    {
        $sql = "UPDATE categories SET title='$title', img='$img' WHERE id='$id_cate'";
        $conn = $this->connect();
        return $conn->query($sql);
    }
    public function GetCategoryID($id_cate)
    {
        $sql = "SELECT * FROM categories WHERE id = $id_cate";
        $con = $this->connect();
        $ketqua = $con->query($sql);

        if ($ketqua->num_rows != 0) {
            $data = mysqli_fetch_array($ketqua);
        } else {
            $data = 0;
        }
        return $data;
    }
    public function DeleteCategory($id_cate)
    {
        $sql = "DELETE FROM categories WHERE id = '$id_cate'";
        $conn = $this->connect();
        return $conn->query($sql);
    }



    /** JOBS */
    public function GetAllJobs()
    {
        $sql = "SELECT * FROM jobs";
        $con = $this->connect();
        $result = $con->query($sql);
        if ($result->num_rows == 0) {
            $data = 0;
        } else {
            while ($datas = mysqli_fetch_assoc($result)) {
                $data[] = $datas;
            }
        }
        return $data;
    }
    public function GetJobsIDCateGory($id)
    {
        $sql = "SELECT * FROM jobs WHERE id_job = $id";
        $con = $this->connect();
        $result = $con->query($sql);
        if ($result->num_rows == 0) {
            $data = 0;
        } else {
            while ($datas = mysqli_fetch_assoc($result)) {
                $data[] = $datas;
            }
        }
        return $data;
    }
    public function GetStatusJob()
    {
        $sql = "SELECT * FROM status_post";
        $con = $this->connect();
        $result = $con->query($sql);
        if ($result->num_rows == 0) {
            $data = 0;
        } else {
            while ($datas = mysqli_fetch_assoc($result)) {
                $data[] = $datas;
            }
        }
        return $data;
    }
    public function AddJob($title, $descrip, $date, $loca, $price, $phone_number, $id_status, $id_category, $user)
    {
        $sql = "INSERT INTO jobs(id, title, descrip, date_post, loca, price, phone_number, id_status, id_category, user)
            VALUES(NULL,'$title', '$descrip', '$date', '$loca', '$price','$phone_number', '$id_status', '$id_category', '$user')";
        $conn = $this->connect();
        return $conn->query($sql);
    }
    public function GetJobID($id_job)
    {
        $sql = "SELECT * FROM jobs WHERE id = $id_job";
        $con = $this->connect();
        $ketqua = $con->query($sql);

        if ($ketqua->num_rows != 0) {
            $data = mysqli_fetch_array($ketqua);
        } else {
            $data = 0;
        }
        return $data;
    }
    public function UpdateJob($id, $title, $descrip, $date_post, $loca, $price, $phone_number, $id_status, $id_category, $user)
    {
        $sql = "UPDATE jobs SET title = '$title', descrip = '$descrip', date_post = '$date_post', loca = '$loca', price = '$price', phone_number = '$phone_number', id_status = '$id_status', id_category = '$id_category', user = '$user' WHERE id='$id'";
        $conn = $this->connect();
        return $conn->query($sql);
    }
    public function AccessJob($id, $title, $descrip, $date_post, $loca, $price, $phone_number, $id_status, $id_category, $user)
    {
        $sql = "UPDATE jobs SET title = '$title', descrip = '$descrip', date_post = '$date_post', loca = '$loca', price = '$price', phone_number = '$phone_number', id_status = '$id_status', id_category = '$id_category', user = '$user' WHERE id='$id'";
        $conn = $this->connect();
        return $conn->query($sql);
    }
    public function DenyJob($id, $title, $descrip, $date_post, $loca, $price, $phone_number, $id_status, $id_category, $user)
    {
        $sql = "UPDATE jobs SET title = '$title', descrip = '$descrip', date_post = '$date_post', loca = '$loca', price = '$price', phone_number = '$phone_number', id_status = '$id_status', id_category = '$id_category', user = '$user' WHERE id='$id'";
        $conn = $this->connect();
        return $conn->query($sql);
    }
    public function SearchJobs($key)
    {
        $sql = "SELECT * FROM jobs WHERE title like '%$key%'";
        $con = $this->connect();
        $result = $con->query($sql);
        if ($result->num_rows == 0) {
            $data = 0;
        } else {
            while ($datas = mysqli_fetch_assoc($result)) {
                $data[] = $datas;
            }
        }
        return $data;
    }
    public function DeleteJob($id_job)
    {
        $sql = "DELETE FROM jobs WHERE id = '$id_job'";
        $conn = $this->connect();
        return $conn->query($sql);
    }

    /**CVs */
    public function GetAllCV()
    {
        $sql = "SELECT * FROM cvs";
        $con = $this->connect();
        $result = $con->query($sql);
        if ($result->num_rows == 0) {
            $data = 0;
        } else {
            while ($datas = mysqli_fetch_assoc($result)) {
                $data[] = $datas;
            }
        }
        return $data;
    }
    public function GetCVID($id_cv)
    {
        $sql = "SELECT * FROM cvs WHERE id = '$id_cv'";
        $con = $this->connect();
        $ketqua = $con->query($sql);

        if ($ketqua->num_rows != 0) {
            $data = mysqli_fetch_array($ketqua);
        } else {
            $data = 0;
        }
        return $data;
    }
    public function GetCVUser($cver)
    {
        $sql = "SELECT * FROM cvs WHERE cver = '$cver' ";
        $con = $this->connect();
        $result = $con->query($sql);
        if ($result->num_rows == 0) {
            $data = 0;
        } else {
            while ($datas = mysqli_fetch_assoc($result)) {
                $data[] = $datas;
            }
        }
        return $data;
    }
    public function AddCV($data_cv, $cver, $id_job)
    {
        $sql = "INSERT INTO cvs(id, data_cv, cver, id_job)
            VALUES(NULL,'$data_cv', '$cver', '$id_job')";
        $conn = $this->connect();
        return $conn->query($sql);
    }
    public function DeleteCV($id_cv)
    {
        $sql = "DELETE FROM cvs WHERE id = '$id_cv'";
        $conn = $this->connect();
        return $conn->query($sql);
    }
    public function DeleteCVFromJob($id_job)
    {
        $sql = "DELETE FROM cvs WHERE id_job = '$id_job'";
        $conn = $this->connect();
        return $conn->query($sql);
    }
}
