<?php
    session_start();
    $servername = "localhost"; 
    $username = "admin"; 
    $password = ""; 
    $dbname = "employeemanager"; 
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if(!$conn){
        die("Connection Failed ". $conn);
    }
    function Execute($sql){
        return mysqli_query($GLOBALS['conn'],$sql);
    }
    function DataResult($data){
        if($data){ 
            if($data->num_rows > 0) {
                while($row = $data->fetch_assoc())
                $dataU[] = $row; 
            }   else $dataU = "";
        }
        else  return false;
        return $dataU;
    }
    function GetdataUser($id,$trangthai)
    {
        $sql = "SELECT * FROM personnel WHERE id=$id and trangthai=$trangthai";
        $data = Execute($sql);
        return DataResult($data);
    }
    function getData($id){
        $sql = "SELECT * FROM personnel WHERE id=$id";
        $data = Execute($sql);
        return DataResult($data);
    }
    function getAllData(){
        $sql = "SELECT * FROM personnel";
        $data = Execute($sql);
        return DataResult($data);
    }
    function InsertData($username,$password,$manhanvien,$ngaytao){
        $username= mysqli_real_escape_string($GLOBALS['conn'],$username);
        $password= mysqli_real_escape_string($GLOBALS['conn'],$username);
        $manhanvien= mysqli_real_escape_string($GLOBALS['conn'],$manhanvien);
        $sql = "INSERT INTO personnel (tentaikhoan,matkhau,manhanvien,ngaytao,trangthai) VALUES('$username','$password','$manhanvien','$ngaytao',1)";
        return Execute($sql);
    }
    function UpdateData($username,$password,$manhanvien,$trangthai,$id){
        $sql = "UPDATE personnel SET tentaikhoan='$username', matkhau='$password' ,manhanvien='$manhanvien',trangthai='$trangthai' WHERE id='$id'";
        return Execute($sql); 
    }
    function UpdateDataUser($username,$password,$manhanvien,$id){
        $sql = "UPDATE personnel SET tentaikhoan='$username', matkhau='$password' ,manhanvien='$manhanvien' WHERE id='$id'";
        return Execute($sql); 
    }
    function DeleteData($id){
        $sql = "DELETE FROM personnel WHERE id=$id";
        return Execute($sql);
    }
    
    function Login($username,$password)
    {
        $username = mysqli_real_escape_string($GLOBALS['conn'],$username);
        $password = mysqli_real_escape_string($GLOBALS['conn'],$password);
        $sql="SELECT * FROM personnel WHERE tentaikhoan= '$username' AND matkhau='$password'";
        $dataCheck =Execute($sql);
        if($dataCheck){
        $data = DataResult($dataCheck);
           if($data)
           {
            $id = $data[0]["id"];
            $_SESSION['login'] = $id;
           }
           else
           {
               return false;
           }
            
        }
        else {
            return false;
        }
        return true;
    }
    function CheckSession(){
        return (isset($_SESSION['login'])) ? true : false;
    }
     function Decentralization($data){
        switch($data){
            case 1: {
                return "user";
                break;
            }
            case 2: {
                return "admin";
                break;
            }
            default: {
                return "guest";
                break;
            }
        }
    }
    function CheckUsername($username)
    {
        $sql = "SELECT tentaikhoan from personnel";
        $column = DataResult(Execute($sql));
        foreach($column as $col)
        {
            if($username === $col['tentaikhoan'])
            {
                return false;
                break;


            }
        }
        return true;
    }
    function CheckstatusUser($status)
    {
        if($status == 1)
        {
            return true;
        }
        else return false;
        
    }
    function Dateformat($date){
        $Dateformat = date_create($date);
        return date_format($Dateformat, "d-m-Y");
    }
?>