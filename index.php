<?php

class Employee {
    // fields
    var $Fname;
    var $Minit;
    var $Lname;
    var $Ssn;
    var $Bdate;
    var $Address;
    var $Sex;
    var $Salary;
    var $Super_ssn;
    var $Dno;
    // methods
    

    function Insert()
    {
        $password = '';
        $link = mysqli_connect("localhost", "root", $password, "company");
        $sql = "INSERT INTO employee (Fname, Minit, Lname, Ssn, Bdate, Address, Sex, Salary, Super_ssn, Dno) VALUES ('$_POST[S1]', '$_POST[S2]', '$_POST[S3]', '$_POST[S4]', '$_POST[S5]', '$_POST[S6]', '$_POST[S7]', '$_POST[S8]', '$_POST[S9]', '$_POST[S10]')";
        if($link->query($sql)===TRUE) echo "New record created successfully";
        else echo "Error: " .$sql . "<br>" . $link->error;
        echo "complete";
        mysqli_close($link);
    }
    
    function Query()
    {
        $password = '';
        $link = mysqli_connect("localhost", "root", $password, "company");
        $result = mysqli_query($link, "select * from employee where Sex='F'");
        $records = mysqli_fetch_all($result);

        foreach ($records as $key => $values) {
            //echo $key . '==>' . $value . '<br>';
            foreach ($values as $key => $value) {
                echo $value . ' ';
            }
            echo '<br>';
        }
        echo "complete";
        mysqli_close($link);
    }
    
    function Replace() 
    {
       $password = '';
        $link = mysqli_connect("localhost", "root", $password, "company");
        $result = mysqli_query($link, "UPDATE employee SET Salary=Salary+300 WHERE Salary<=25000");  
        echo "complete";
        mysqli_close($link);
    }
    
    function Delete() 
    {
        $password = '';
        $link = mysqli_connect("localhost", "root", $password, "company");
        $sql = "DELETE FROM employee WHERE Sex='M'";

        if ($link->query($sql) === TRUE) echo "Record deleted successfully";
        else echo "Error deleting record: " . $link->error;
        
    }

};


$func=$_POST['func'];    
if($func=='Insert1')
{                   
        echo "<form method='POST' action='index.php'>";  
        echo "<input type='hidden' name='func' value='Insert'>";
        echo "Fname:<textarea rows='1' name='S1' cols='3'></textarea><br>";
        echo "Minit:<textarea rows='1' name='S2' cols='3'></textarea><br>";
        echo "Lname:<textarea rows='1' name='S3' cols='3'></textarea><br>";
        echo "Ssn:<textarea rows='1' name='S4' cols='3'></textarea><br>";
        echo "Bdate:<textarea rows='1' name='S5' cols='3'></textarea><br>";
        echo "Address:<textarea rows='1' name='S6' cols='3'></textarea><br>";
        echo "Sex:<textarea rows='1' name='S7' cols='3'></textarea><br>";
        echo "Salary:<textarea rows='1' name='S8' cols='3'></textarea><br>";
        echo "Super_ssn:<textarea rows='1' name='S9' cols='3'></textarea><br>";
        echo "Dno:<textarea rows='1' name='S10' cols='3'></textarea><br>";
        echo  "<input type='submit' value='送出' name='B1'>";
        echo "</form>";
}
if($func=='Insert')
{                   
       $p = new Employee;
       $p->Insert();
}
if($func=='Query')
{
    $p = new Employee;
    $p->Query();
}
if($func=='Replace')
{
    $p = new Employee;
    $p->Replace();
}
if($func=='Delete')
{
    $p = new Employee;
    $p->Delete();
}
?>

