<?php
include('./config/db.php');
$sql = "SELECT * FROM sanpham";
if ($result = mysqli_query($link, $sql)) {
        while ($row = mysqli_fetch_array($result)) {
?>
                <tr>
                        <td><?php echo $row['TenSanPham'] ?></td>
                        <td>System Architect</td>
                        <td>Edinburgh</td>
                        <td>61</td>
                        <!-- <td>2011/04/25</td>
                                            <td>$320,800</td> -->
                </tr>
<?php
        }
}
?>