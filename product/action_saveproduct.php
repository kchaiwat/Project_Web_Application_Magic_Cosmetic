<?php include "../connect.php" ?>
<?php $stmt = $pdo->prepare("INSERT INTO product VALUES ('', ?, ?, ?, ?, ?, ?)");
$stmt->bindParam(1, $_POST["Product_name"]);
$stmt->bindParam(2, $_POST["ProType_ID"]);
$stmt->bindParam(3, $_POST["Product_detail"]);
$stmt->bindParam(4, $_POST["Product_price"]);
$stmt->bindParam(5, $_POST["Product_stock"]);

$path = pathinfo(basename($_FILES['p_pic']['name']),PATHINFO_EXTENSION);

	if ($path=="png" or $path=="jpg" or $path=="jpeg") {
	$new_pic_name = 'pvr_'.uniqid().".".$path;
	$pic_folder_path = "pic_product/";
	$upload_path = $pic_folder_path.$new_pic_name ;
	//uploading
	$success = move_uploaded_file($_FILES['p_pic']['tmp_name'],$upload_path);
 	if($success==FALSE){
 		echo "upload is FALSE";
 		exit();
 	}
}else{
	echo "please upload photo again";
	exit();
}

$_POST["p_pic"] = $new_pic_name;

$stmt->bindParam(6, $_POST["p_pic"]);

if($stmt->execute())
header("location: list_product.php");

?>

<html>
<head>
<meta charset= "UTF - 8 ">
</head>
<body>  </body>
 </html>
