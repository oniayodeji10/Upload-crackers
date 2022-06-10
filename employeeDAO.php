<?php
require_once('abstractDAO.php');
require_once('./model/employee.php');

class employeeDAO extends abstractDAO {
        
    function __construct() {
        try{
            parent::__construct();
        } catch(mysqli_sql_exception $e){
            throw $e;
        }
    }  
    
    public function getEmployee($employeeId){
        $query = 'SELECT * FROM employees WHERE id = ?';
        $stmt = $this->mysqli->prepare($query);
        $stmt->bind_param('i', $employeeId);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows == 1){
            $temp = $result->fetch_assoc();
            $employee = new employee($temp['id'],$temp['name'], $temp['address'], $temp['salary'], $temp['date']);
            $result->free();
            return $employee;
        }
        $result->free();
        return false;
    }


    public function getEmployees(){
        //The query method returns a mysqli_result object
        $result = $this->mysqli->query('SELECT * FROM employees');
        $employees = Array();
        
        if($result->num_rows >= 1){
            while($row = $result->fetch_assoc()){
                //Create a new employee object, and add it to the array.
                $employee = new Employee($row['id'], $row['name'], $row['address'], $row['salary'], $row['date']);
                $employees[] = $employee;
            }
            $result->free();
            return $employees;
        }
        $result->free();
        return false;
    }   
    
    public function addEmployee($employee){
        
        if(!$this->mysqli->connect_errno){
            //The query uses the question mark (?) as a
            //placeholder for the parameters to be used
            //in the query.
            //The prepare method of the mysqli object returns
            //a mysqli_stmt object. It takes a parameterized 
            //query as a parameter.
			$query = 'INSERT INTO employees (name, address, salary, date) VALUES (?,?,?,?)';
			$stmt = $this->mysqli->prepare($query);
            if($stmt){
                    $name = $employee->getName();
			        $address = $employee->getAddress();
			        $salary = $employee->getSalary();
                    $date = $employee->getDate();
                  
			        $stmt->bind_param('ssis', 
				        $name,
				        $address,
				        $salary,
                        $date
			        );    
                    //Execute the statement
                    $stmt->execute();         
                    
                    if($stmt->error){
                        return $stmt->error;
                    } else {
                        return $employee->getName() . ' added successfully!';
                    } 
			}
             else {
                $error = $this->mysqli->errno . ' ' . $this->mysqli->error;
                echo $error; 
                return $error;
            }
       
        }else {
            return 'Could not connect to Database.';
        }
    }   
    public function updateEmployee($employee){
        
        if(!$this->mysqli->connect_errno){
            //The query uses the question mark (?) as a
            //placeholder for the parameters to be used
            //in the query.
            //The prepare method of the mysqli object returns
            //a mysqli_stmt object. It takes a parameterized 
            //query as a parameter.
            $query = "UPDATE employees SET name=?, address=?, salary=?, date=? WHERE id=?";
            $stmt = $this->mysqli->prepare($query);
            if($stmt){
                    //$id = $employee->getId();
                    $name = $employee->getName();
			        $address = $employee->getAddress();
			        $salary = $employee->getSalary();
                    $date = $employee->getDate();
                  
			        $stmt->bind_param('issis',
                        $id, 
				        $name,
				        $address,
				        $salary,
                        $date
                       
			        );    
                    //Execute the statement
                    $stmt->execute();         
                    
                    if($stmt->error){
                        return $stmt->error;
                    } else {
                        return $employee->getName() . ' updated successfully!'; 
                    } 
                   
			}
            
             else {
                $error = $this->mysqli->errno . ' ' . $this->mysqli->error;
                echo $error; 
                return $error;
            }
       
        }else {
            return 'Could not connect to Database.';
        }
    }   

    public function deleteEmployee($employeeId){
        if(!$this->mysqli->connect_errno){
            $query = 'DELETE FROM employees WHERE id = ?';
            $stmt = $this->mysqli->prepare($query);
            $stmt->bind_param('i', $employeeId);
            $stmt->execute();
            if($stmt->error){
                return false;
            } else {
                return true;
            }
        } else {
            return false;
        }
    }
}
?>

