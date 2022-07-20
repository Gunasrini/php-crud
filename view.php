<?php include "db-connect.php" ?>
<h2>Students List</h2>
    <table class="table text-white">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Age</th>
                <th>City</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $sql = "SELECT * FROM students";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                // output data of each row
                $i = 0;
                while($row = $result->fetch_assoc()) {
                    $i++;
                    echo "<tr>";
                    echo "<td>{$i}</td>";
                    echo "<td>{$row['name']}</td>";
                    echo "<td>{$row['age']}</td>";
                    echo "<td>{$row['city']}</td>";
                    echo "<td><a href='#'><button class='btn btn-primary editRow' data-id='{$row["id"]}'>Edit</button></a></td>";
                    echo "<td><a href='#'><button class='btn btn-danger delRow' data-id='{$row["id"]}'>Delete</button></a></td>";
                    echo "</tr>";
                }
                } else {
                    echo "<tr>";
                    echo "<td align='center' colspan='6'>No Students Found</td>";
                    echo "</tr>";
                }
                $conn->close();
            ?>
            <!-- <tr>
                <td>1</td>
                <td>Suresh</td>
                <td>25</td>
                <td>Trichy</td>
                <td><a href="#"><button class="btn btn-primary">Edit</button></a></td>
                <td><a href="#"><button class="btn btn-danger">Delete</button></a></td>
            </tr> -->
        </tbody>
    </table>