<?php



include('dbConfig.php');




if (!isset($_SESSION['USER_ID'])) {
	header("location:signin.php");
	die();
}






$user = $_SESSION['USER_NAME'];
$query = mysqli_query($conn,"select * from users where username = '$user'");
$rowr =mysqli_fetch_array($query);
$id = $rowr['id'];

// echo "$id";
// echo "Hello hjkhjuvfb ";

 if (isset($_REQUEST['submit'])) 
 {
 	 $category =   $_REQUEST['category'];
 	 $total_expense = $_REQUEST['total_expense'];
 	 $issued_date = $_REQUEST['issued_date'];
 	 $status = $_REQUEST['status'];
    mysqli_query($conn,"insert into user_data(category,total_expense,issued_date,status,user_id)value('$category','$total_expense','$issued_date','$status','$id')");
 }




$query1 = mysqli_query($conn,"select * from user_data where user_id = '$id'");
$result = mysqli_num_rows($query1);
?>





<html>
<style>

    
</style>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>Expense Tracker Dashboard</title>
    <link rel="stylesheet" href="dashboard.css">
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
</head>

<body>
<div class="container">
                <div id="expenseForm" style="display: none;">
                    <h2>Expense Details</h2>
                    <form id="expenseEntryForm" action="#" method="POST">
        
                        <label for="category">Category :</label>
                        <input type="text" id="category" name="category" required><br><br>
        
                        <label for="totalExpense">Total Expense:</label>
                        <input type="number" id="total_expense" name="total_expense" required><br><br>
        
                        <label for="issuedDate">Issued Date:</label>
                        <input type="date" id="issued_date" name="issued_date" required><br><br>
        
                        <label for="status">Status:</label>
                        <select name="status" id="status" required>
                            <option value="paid">Paid</option>
                            <option value="unpaid">Unpaid</option>
                        </select><br><br>
        
                        <input type="submit" name="submit" value="submit" id="submit">
                        <input type="button" name="cancel" value="cancel" id="cancel">
                    </form>
                </div>
            </div>
    <input type="checkbox" id="menu-toggle">
    <div class="sidebar">
        <div class="side-header">
            <h3><span>Logo</span></h3>
        </div>

        <div class="side-content">
            <div class="profile">
                <div class="profile-img bg-img" style="background-image: url(img/1.jpeg)"></div>
                <h4>
                    <?php echo $_SESSION['USER_NAME'] ?>
                </h4>
                <small>User <?php  echo $id?></small>
            </div>

            <div class="side-menu">
                <ul>
                    <li>
                        <a href="#" class="active">
                            <span class="las la-home"></span>
                            <small>Dashboard</small>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="las la-user-alt"></span>
                            <small>Profile</small>
                        </a>
                    </li>
                    <li>
                        <a href="contact.php">
                            <span class="las la-tasks"></span>
                            <small>Contact Us</small>
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </div>

    <div class="main-content">

        <header>
            <div class="header-content">
                <label for="menu-toggle">
                    <span class="las la-bars"></span>
                </label>

                <div class="header-menu">

                    <div class="notify-icon">
                        <span class="las la-envelope"></span>
                        <span class="notify">4</span>
                    </div>

                    <div class="notify-icon">
                        <span class="las la-bell"></span>
                        <span class="notify">3</span>
                    </div>

                    <div class="user">
                        <div class="bg-img" style="background-image: url(img/1.jpeg)"></div>

                        <span class="las la-power-off"></span>
                        <span><a href="logout.php">Logout</a></span>
                    </div>
                </div>
            </div>
        </header>


        <main>

            <div class="page-header">
                <h1>Dashboard</h1>
                <small>Home / Dashboard</small>
            </div>

            <div class="page-content">

                <div class="analytics">

                    <div class="card">
                        <div class="card-head">
                            <h2>34</h2>
                            <span class="las la-shopping-cart"></span>
                        </div>
                        <div class="card-progress">
                            <small>Grocery Purchases</small>
                            <div class="card-indicator">
                                <div class="indicator one" style="width: 60%"></div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-head">
                            <h2>40</h2>
                            <span class="las la-taxi"></span>
                        </div>
                        <div class="card-progress">
                            <small>Travel</small>
                            <div class="card-indicator">
                                <div class="indicator two" style="width: 80%"></div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-head">
                            <h2>16</h2>
                            <span class="las la-beer"></span>
                        </div>
                        <div class="card-progress">
                            <small>Food Purchases</small>
                            <div class="card-indicator">
                                <div class="indicator three" style="width: 65%"></div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-head">
                            <h2>9</h2>
                            <span class="las la-envelope"></span>
                        </div>
                        <div class="card-progress">
                            <small>Monthly Bills</small>
                            <div class="card-indicator">
                                <div class="indicator four" style="width: 90%"></div>
                            </div>
                        </div>
                    </div>

                </div>


                <div class="records table-responsive">

                    <div class="record-header">
                        <div class="add">
                            <button id="showExpenseForm">Add record</button>
                        </div>

                        <div class="browse">
                            <input type="date" placeholder="Search" class="record-search">
                            <select name="" id="">
                                <option value="all">All</option>
                                <option value="paid">Paid</option>
                                <option value="unpaid">Unpaid</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <table width="100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th><span class="las la-sort"></span> CATEGORY</th>
                                    <th><span class="las la-sort"></span> TOTAL EXPENSE</th>
                                    <th><span class="las la-sort"></span> ISSUED DATE</th>
                                    <th><span class="las la-sort"></span> STATUS</th>
                                    <th><span class="las la-sort"></span> ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody id="expenseTableBody">
                            <?php 
                                for($i=1; $i<=$result;$i++){
                                    $row =  mysqli_fetch_array($query1)
 	                            ?>
                                <tr>
                                    <td>#<?php  echo $row['data_id']?></td>
                                    <td>
                                        <div class="client">
                                            <div class="client-img bg-img" style="background-image: url(img/1.jpeg)">
                                            </div>
                                            <div class="client-info">
                                                <h3><?php  echo $row['category']?></h3>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        Rs <?php  echo $row['total_expense']?>
                                    </td>
                                    <td>
                                        <?php  echo $row['issued_date']?>
                                    </td>
                                    <td>
                                        <?php  echo $row['status']?>
                                    </td>
                                    <td>
                                        <div class="actions">
                                            <button class="editExpense">Edit</button>
                                            <button class="deleteExpense">Delete</button>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?> 
                                <!-- <tr>
                                    <td>#5031</td>
                                    <td>
                                        <div class="client">
                                            <div class="client-img bg-img" style="background-image: url(img/1.jpeg)">
                                            </div>
                                            <div class="client-info">
                                                <h4>Arunabh Shikhar</h4>
                                                <small>arunabh@gmail.com</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        Rs 300
                                    </td>
                                    <td>
                                        19 April, 2022
                                    </td>
                                    <td>
                                        <span class="paid">Not paid</span>
                                    </td>
                                    <td>
                                        <div class="actions">
                                            <span class="lab la-telegram-plane"></span>
                                            <span class="las la-eye"></span>
                                            <span class="las la-ellipsis-v"></span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>#5031</td>
                                    <td>
                                        <div class="client">
                                            <div class="client-img bg-img" style="background-image: url(img/1.jpeg)">
                                            </div>
                                            <div class="client-info">
                                                <h4>Arunabh Shikhar</h4>
                                                <small>arunabh@gmail.com</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        Rs 200
                                    </td>
                                    <td>
                                        19 April, 2022
                                    </td>
                                    <td>
                                        <span class="paid">Not Paid</span>
                                    </td>
                                    <td>
                                        <div class="actions">
                                            <span class="lab la-telegram-plane"></span>
                                            <span class="las la-eye"></span>
                                            <span class="las la-ellipsis-v"></span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>#5031</td>
                                    <td>
                                        <div class="client">
                                            <div class="client-img bg-img" style="background-image: url(img/1.jpeg)">
                                            </div>
                                            <div class="client-info">
                                                <h4>Arunabh Shikhar</h4>
                                                <small>arunabh@gmail.com</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        Rs 150
                                    </td>
                                    <td>
                                        19 April, 2022
                                    </td>
                                    <td>
                                        <span class="paid">Not Paid</span>
                                    </td>
                                    <td>
                                        <div class="actions">
                                            <span class="lab la-telegram-plane"></span>
                                            <span class="las la-eye"></span>
                                            <span class="las la-ellipsis-v"></span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>#5031</td>
                                    <td>
                                        <div class="client">
                                            <div class="client-img bg-img" style="background-image: url(img/1.jpeg)">
                                            </div>
                                            <div class="client-info">
                                                <h4>Arunabh Shikhar</h4>
                                                <small>arunabh@gmail.com</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        Rs 15,000
                                    </td>
                                    <td>
                                        19 April, 2022
                                    </td>
                                    <td>
                                        -Rs 1500
                                    </td>
                                    <td>
                                        <div class="actions">
                                            <span class="lab la-telegram-plane"></span>
                                            <span class="las la-eye"></span>
                                            <span class="las la-ellipsis-v"></span>
                                        </div>
                                    </td>
                                </tr>
                                <td>#5031</td>
                                <td>
                                    <div class="client">
                                        <div class="client-img bg-img" style="background-image: url(img/1.jpeg)">
                                        </div>
                                        <div class="client-info">
                                            <h4>Arunabh Shikhar</h4>
                                            <small>arunabh@gmail.com</small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    Rs 15,000
                                </td>
                                <td>
                                    19 April, 2022
                                </td>
                                <td>
                                    -Rs 1500
                                </td>
                                <td>
                                    <div class="actions">
                                        <span class="lab la-telegram-plane"></span>
                                        <span class="las la-eye"></span>
                                        <span class="las la-ellipsis-v"></span>
                                    </div>
                                </td>
                                </tr>
                                <tr>
                                    <td>#5031</td>
                                    <td>
                                        <div class="client">
                                            <div class="client-img bg-img" style="background-image: url(img/1.jpeg)">
                                            </div>
                                            <div class="client-info">
                                                <h4>Arunabh Shikhar</h4>
                                                <small>arunabh@gmail.com</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        Rs 340
                                    </td>
                                    <td>
                                        19 April, 2022
                                    </td>
                                    <td>
                                        <span class="paid">Not Paid</span>
                                    </td>
                                    <td>
                                        <div class="actions">
                                            <span class="lab la-telegram-plane"></span>
                                            <span class="las la-eye"></span>
                                            <span class="las la-ellipsis-v"></span>
                                        </div>
                                    </td>
                                </tr> -->

                            </tbody>
                        </table>
                    </div>

                </div>

            </div>
            

        </main>

    </div>


</body>


</html>