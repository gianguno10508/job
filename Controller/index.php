<?php
require_once "Model/dbmodel.php";
session_start();

class Controller extends Model
{
    public function MainControl()
    {
        $dataUser = $this->GetDataUser();
        $dataUserRole = $this->GetDataUserRole();
        $categories = $this->GetAllCategories();
        $jobs = $this->GetAllJobs();
        $statusJob = $this->GetStatusJob();
        $cvs = $this->GetAllCV();
        if (isset($_GET['action'])) {
            $action = $_GET['action'];
            switch ($action) {

                /** User */
                case 'login': {
                        if (isset($_POST['login'])) {
                            $count = 0;
                            $user = $_POST['username'];
                            $pass = $_POST['password'];
                            foreach ($dataUser as $value) {
                                if ($value['username'] == $user && $value['pass'] == $pass) {
                                    $_SESSION['username'] = $user;
                                    $_SESSION['role'] = $value['id_role'];
                                    $count++;
                                    break;
                                }
                            }
                        }
                        require_once('View/page/login/login.php');
                        break;
                    }
                case 'signup': {
                        if (isset($_POST['register'])) {
                            $user = $_POST['username'];
                            $pass = $_POST['password'];
                            $repass = $_POST['repassword'];
                            $len = strlen($pass);
                            $mail = $_POST['email'];
                            $who = $_POST['who'];
                            $check = 0;
                            if ($pass != $repass) {
                                $check = -1;
                            }
                            if ($len < 8) {
                                $check = 1;
                            }
                            foreach ($dataUser as $value) {
                                if ($value['username'] == $user) {
                                    $check = 2;
                                    break;
                                }
                            }
                            if ($check == 0) {
                                $this->RegisterUser($user, $pass, $mail, $who);
                            }
                        }
                        require_once('View/page/signup.php');
                        break;
                    }
                case 'account': {
                        if (isset($_SESSION['username'])) {
                            $username = $_SESSION['username'];
                            $dataCVer = $this->GetCVUser($username);
                            if (isset($_GET['add-job'])) {
                                if (isset($_POST['add_job'])) {
                                    $title = $_POST['name'];
                                    $descrip = $_POST['description'];
                                    $loca = $_POST['locate'];
                                    $date = date("Y-m-d");
                                    $price = $_POST['price'];
                                    $phone_number = $_POST['phone_number'];
                                    $id_job = $_POST['category'];
                                    $id_status = 2;
                                    $user = $_POST['id_user'];
                                    if ($this->AddJob($title, $descrip, $date, $loca, $price, $phone_number, $id_status, $id_job, $user)) {
                                        header('location: http://localhost/Job/?action=account&dashboard_user');
                                    }
                                }
                                require_once('View/page/addjob.php');
                                break;
                            }
                            if (isset($_GET['update_job'])) {
                                if (isset($_GET['id'])) {
                                    $id = $_GET['id'];
                                    $dataJobId = $this->GetJobID($id);
                                    if (isset($_POST['update_job'])) {
                                        $title = $_POST['name'];
                                        $descrip = $_POST['description'];
                                        $loca = $_POST['locate'];
                                        $date_post = $_POST['date_post'];
                                        $price = $_POST['price'];
                                        $phone_number = $_POST['phone_number'];
                                        $id_job = $_POST['category'];
                                        $id_status = $_POST['id_status'];
                                        $user = $_POST['id_user'];
                                        if ($this->UpdateJob($id, $title, $descrip, $date_post, $loca, $price, $phone_number, $id_status, $id_job, $user)) {
                                            header('location: http://localhost/Job/?action=account&dashboard_user');
                                        }
                                    }
                                }
                                require_once('View/page/updatejob.php');
                                break;
                            }
                            if (isset($_GET['delete_job'])) {
                                if (isset($_GET['id'])) {
                                    $id = $_GET['id'];
                                    if ($this->DeleteJob($id)) {
                                        if ($this->DeleteCVFromJob($id)) {
                                            header('location: http://localhost/Job/?action=account&dashboard_user');
                                        }
                                    }
                                }
                                require_once('View/page/updatejob.php');
                                break;
                            } elseif (isset($_GET['changepass'])) {
                                if (isset($_POST['changepass'])) {
                                    $check = 0;
                                    $user = $_SESSION['username'];
                                    $passold = $_POST['passwordold'];
                                    $passnew = $_POST['passwordnew'];
                                    $repassnew = $_POST['repasswordnew'];
                                    $len = strlen($passnew);
                                    if ($passnew != $repassnew) {
                                        $check = -1;
                                    }
                                    if ($len < 8) {
                                        $check = 1;
                                    }
                                    foreach ($dataUser as $value) {
                                        if ($value['username'] == $user) {
                                            if ($value['pass'] != $passold) {
                                                $check = 2;
                                                break;
                                            }
                                            if ($value['pass'] == $passnew) {
                                                $check = 3;
                                                break;
                                            }
                                        }
                                    }
                                    if ($check == 0) {
                                        if ($this->ChangePass($user, $passnew)) {
                                            header('location: http://localhost/Job/?action=account&dashboard_user');
                                        }
                                    }
                                }
                            } elseif (isset($_GET['download'])) {
                                if (isset($_GET['cv_id'])) {
                                    $id = $_GET['cv_id'];

                                    // fetch file to download from database
                                    $result = $this->GetCVID($id);

                                    // $file = mysqli_fetch_assoc($result);
                                    $filepath = 'uploads/' . $result['data_cv'];

                                    if (file_exists($filepath)) {
                                        header('Content-Description: File Transfer');
                                        header('Content-Type: application/octet-stream');
                                        header('Content-Disposition: attachment; filename=' . basename($filepath));
                                        header('Expires: 0');
                                        header('Cache-Control: must-revalidate');
                                        header('Pragma: public');
                                        header('Content-Length: ' . filesize('uploads/' . $result['data_cv']));
                                        readfile('uploads/' . $result['data_cv']);
                                        //exit;
                                    }
                                }
                            } elseif (isset($_GET['delete_cv'])) {
                                if (isset($_GET['id'])) {
                                    $id = $_GET['id'];
                                    if ($this->DeleteCV($id)) {
                                        header('location: http://localhost/Job/?action=account&dashboard_user');
                                    }
                                }
                                require_once('View/page/updatejob.php');
                                break;
                            } else {
                                $username = $_SESSION['username'];
                                $dataUserDetail = $this->GetDataUserDetail($username);
                                require_once('View/page/account.php');
                                break;
                            }
                        } else {
                            echo '<h1 style="text-align: center">Bạn cần đăng nhập!!!</h1>';
                            die;
                        }
                        break;
                    }
                case 'logout': {
                        unset($_SESSION['username']);
                        unset($_SESSION['role']);
                        header('location: http://localhost/Job');
                        break;
                    }


                /** Manager */
                case 'manager': {
                        if (isset($_GET['categories_manager'])) {
                            if (isset($_GET['add_categories'])) {
                                if (isset($_POST['add_category'])) {
                                    $title = $_POST['title'];
                                    $img_name = $_FILES['image']['name'];
                                    $img_size = $_FILES['image']['size'];
                                    $tmp_name = $_FILES['image']['tmp_name'];
                                    $error = $_FILES['image']['error'];

                                    if ($error === 0) {
                                        $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                                        $img_ex_lc = strtolower($img_ex);

                                        $allowed_exs = array("jpg", "jpeg", "png");

                                        if (in_array($img_ex_lc, $allowed_exs)) {
                                            $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                                            $img_upload_path = 'uploads/' . $new_img_name;
                                            move_uploaded_file($tmp_name, $img_upload_path);

                                            if ($this->AddCategory($title, $new_img_name)) {
                                                header('location: http://localhost/Job/?action=manager&categories_manager');
                                            }
                                        }
                                    }
                                }
                                require_once('View/page/manager_admin/addcategories.php');
                                break;
                            } elseif (isset($_GET['update_categories'])) {
                                if (isset($_GET['id'])) {
                                    $id_cate = $_GET['id'];
                                    $categoryID = $this->GetCategoryID($id_cate);
                                    if (isset($_POST['update_category'])) {
                                        $title = $_POST['title'];
                                        $img_name = $_FILES['image']['name'];
                                        $img_size = $_FILES['image']['size'];
                                        $tmp_name = $_FILES['image']['tmp_name'];
                                        $error = $_FILES['image']['error'];

                                        if ($error === 0) {
                                            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                                            $img_ex_lc = strtolower($img_ex);

                                            $allowed_exs = array("jpg", "jpeg", "png");

                                            if (in_array($img_ex_lc, $allowed_exs)) {
                                                $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                                                $img_upload_path = 'uploads/' . $new_img_name;
                                                move_uploaded_file($tmp_name, $img_upload_path);

                                                if ($this->UpdateCategory($id_cate, $title, $new_img_name)) {
                                                    header('location: http://localhost/Job/?action=manager&categories_manager');
                                                }
                                            }
                                        }
                                    }
                                }
                                require_once('View/page/manager_admin/updatecategories.php');
                                break;
                            } elseif (isset($_GET['delete_categories'])) {
                                if (isset($_GET['id'])) {
                                    $id_cate = $_GET['id'];
                                    if ($this->DeleteCategory($id_cate)) {
                                        header('location: http://localhost/Job/?action=manager&categories_manager');
                                    }
                                }
                                break;
                            }
                            require_once('View/page/manager_admin/categories.php');
                            break;
                        } elseif (isset($_GET['jobs_manager'])) {
                            if (isset($_GET['accecss_job'])) {
                                if (isset($_GET['id'])) {
                                    $id = $_GET['id'];
                                    $dataJobId = $this->GetJobID($id);
                                    $title = $dataJobId['title'];
                                    $descrip = $dataJobId['descrip'];
                                    $date_post = $dataJobId['date_post'];
                                    $loca = $dataJobId['loca'];
                                    $price = $dataJobId['price'];
                                    $phone_number = $dataJobId['phone_number'];
                                    $id_status = 1;
                                    $id_category = $dataJobId['id_category'];
                                    $user = $dataJobId['user'];
                                    if ($this->AccessJob($id, $title, $descrip, $date_post, $loca, $price, $phone_number, $id_status, $id_category, $user)) {
                                        header('location: http://localhost/Job/?action=manager&jobs_manager');
                                    }
                                }
                                require_once('View/page/manager/index.php');
                                break;
                            } elseif (isset($_GET['deny_job'])) {
                                if (isset($_GET['id'])) {
                                    $id = $_GET['id'];
                                    $dataJobId = $this->GetJobID($id);
                                    $title = $dataJobId['title'];
                                    $descrip = $dataJobId['descrip'];
                                    $date_post = $dataJobId['date_post'];
                                    $loca = $dataJobId['loca'];
                                    $price = $dataJobId['price'];
                                    $phone_number = $dataJobId['phone_number'];
                                    $id_status = 3;
                                    $id_category = $dataJobId['id_category'];
                                    $user = $dataJobId['user'];
                                    if ($this->DenyJob($id, $title, $descrip, $date_post, $loca, $price, $phone_number, $id_status, $id_category, $user)) {
                                        header('location: http://localhost/Job/?action=manager&jobs_manager');
                                    }
                                }
                                require_once('View/page/manager/index.php');
                                break;
                            }
                            require_once('View/page/manager_admin/jobs.php');
                            break;
                        } elseif (isset($_GET['changepass-admin'])) {
                            if (isset($_POST['changepass'])) {
                                $check = 0;
                                $user = $_SESSION['username'];
                                $passold = $_POST['passwordold'];
                                $passnew = $_POST['passwordnew'];
                                $repassnew = $_POST['repasswordnew'];
                                $len = strlen($passnew);
                                if ($passnew != $repassnew) {
                                    $check = -1;
                                }
                                if ($len < 8) {
                                    $check = 1;
                                }
                                foreach ($dataUser as $value) {
                                    if ($value['username'] == $user) {
                                        if ($value['pass'] != $passold) {
                                            $check = 2;
                                            break;
                                        }
                                        if ($value['pass'] == $passnew) {
                                            $check = 3;
                                            break;
                                        }
                                    }
                                }
                                if ($check == 0) {
                                    if ($this->ChangePass($user, $passnew)) {
                                        header('location: http://localhost/Job/?action=manager');
                                    }
                                }
                            }
                            require_once('View/page/manager_admin/changepass.php');
                            break;
                        } else {
                            require_once('View/page/manager_admin/index.php');
                            break;
                        }
                    }



                /** Detail job */
                case 'job_detail': {
                        if (isset($_GET['id'])) {
                            $id = $_GET['id'];
                            $jobID = $this->GetJobID($id);
                            if (isset($_POST['savecv'])) {
                                $filename = $_FILES['mycv']['name'];
                                $checkCV = 0;
                                // destination of the file on the server
                                $destination = 'uploads/' . $filename;
                                // get the file extension
                                $extension = pathinfo($filename, PATHINFO_EXTENSION);
                                // the physical file on a temporary uploads directory on the server
                                $file = $_FILES['mycv']['tmp_name'];
                                $size = $_FILES['mycv']['size'];
                                if (!in_array($extension, ['pdf', 'docx'])) {
                                    $checkCV = 2;
                                } elseif ($_FILES['mycv']['size'] > 10000000) { // file shouldn't be larger than 1Megabyte
                                    $checkCV = 3;
                                } else {
                                    // move the uploaded (temporary) file to the specified destination
                                    if (move_uploaded_file($file, $destination)) {
                                        //if($jobID['data_cv'] == null){
                                        if ($this->AddCV($filename, $_SESSION['username'], $id)) {
                                            $checkCV = 1;
                                        }
                                        // }else{

                                        // }
                                    } else {
                                        $checkCV = 3;
                                    }
                                }
                            }
                        }
                        require_once('View/page/job_details.php');
                        break;
                    }

                /** All job */
                case 'view-all-jobs': {
                        require_once('View/page/all_jobs.php');
                        break;
                    }


                /** Category detail */
                case 'view-category': {
                        if (isset($_GET['id'])) {
                            $id = $_GET['id'];
                            $jobByIdCate = $this->GetJobsIDCateGory($id);
                        }
                        require_once('View/page/all_job_by_id_cate.php');
                        break;
                    }
            }
        } else {
            if (isset($_REQUEST['search'])) {
                $key = addslashes($_GET['key']);
                $dataSearch = $this->SearchJobs($key);
            }
            require_once('View/page/homepage.php');
        }
    }
}
?>