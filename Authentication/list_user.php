<?php include "../connect.php" ?>
<?php session_start(); ?>
<html>
<head>
<meta charset="utf-8">
                        <script>
                        function confirmDelete(User_ID) {
                        var ans = confirm("Do you want to delete the item? " + User_ID);
                        if (ans==true)
                        document.location = "action_deleteuser.php?User_ID=" + User_ID;
                        }
                        </script>
                        </head>
<body>

    <?php if($_SESSION["Username"]=='admin') { ?>
                        <!-- ********************************************************************************************** -->

                        <table border="1">

                             <tr>
                                <th>USER ID</th>
                                <th>ชื่อ</th>
                                <th>นามสกุล</th>
                                <th>ที่อยู่</th>
                                <th>อีเมล์</th>
                                <th>เบอร์โทรศัพท์</th>

                            </tr>


<!-- ********************************************************************************************** -->
                                        <?php
                                        $stmt = $pdo->prepare("SELECT * from user ORDER BY User_ID ");

                                        $stmt->execute();

                                        while ($row = $stmt->fetch()) {



                                        ?>
<!-- ********************************************************************************************** -->

                                <tr>
                                    <td><?=$row["User_ID"]?></td>
                                    <td><?=$row["User_fname"]?></td>
                                    <td><?=$row["User_lname"]?></td>
                                    <td><?=$row["User_add"]?></td>
                                    <td><?=$row["User_email"]?></td>
                                    <td><?=$row["User_tel"]?></td>

                                    <td >

                                      <form method="post" action="edit_Mul_User.php" >
                                        <input type="hidden" value="<?=$row["User_ID"]?>" name="User_ID">
                                        <input type="submit" value="แก้ไข">
                                      </form>

                                            <a href="#" onclick='confirmDelete(<?=$row["User_ID"]?>);' >

                                             Del</a>
                                     </td>
                                </tr>
                                <?php
                                }
                                ?>

<!-- ********************************************************************************************** -->
<?php
}
else {
  echo "กรุณาเข้าสู่ผู้ดูแลระบบ";
  	//header("location: login.html");
}
?>
<!-- ********************************************************************************************** -->
    </table>

</body>
</html>
