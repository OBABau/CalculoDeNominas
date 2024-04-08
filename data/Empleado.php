<?php
include_once('conexionDB.php');
class Empleado extends ConexionDB
{
    private $nombre;
    private $nombreFiscal;
    private $rfc;
    private $direccion;
    private $codigoPostal;
    private $ciudad;
    private $estado;
    private $correo;
    private $contrasena;
    private $userId;

    public function getUserData($email) {
        $result = $this->connect();
        $email = mysqli_real_escape_string($this->getConnection(), $email);
    
        $query = "SELECT email, password FROM user WHERE email = '$email'";
    
        if ($result) {
            $consulta = $this->execquery($query);
    
            if ($consulta) {
               
                if ($tupla = mysqli_fetch_assoc($consulta)) {
                    return $tupla;
                }
            }
        }
    
        return false;
    }

    public function obtenerDatosEmpleado() {
    $result = $this->connect();
    $query = "SELECT * FROM worker where code = ".$_SESSION['code'];
    //echo $query;
    if ($result) {
        $dataset = $this->execquery($query);
    }

    return $dataset;
}

public function setUser($userId) 
    {
    
    $this->userId = $userId;
}
public function getEmpleado(){
    $result = $this->connect();
    if($result)
    {
        //echo"todo bien";
        //echo "select * from worker where user in (select code from user where email = '".$_SESSION['start']."')";
        $dataset = $this->execquery("select * from worker where user in (select code from user where email = '".$_SESSION['start']."')");
    }
    else
    {
        echo"algo salio mal";
        $dataset = "error";
    }
    return $dataset;
}

public function getData() {
    $result = $this->connect();
    if ($result) {
        $query = "SELECT 
            YEAR(payDate) as year,
            MONTH(payDate) as month, 
            SUM(total) as totalIncome 
        FROM (
            SELECT 
                payDate,
                MONTH(payDate) as month, 
                total
            FROM 
                SALARY 
            WHERE 
                worker IN (SELECT code FROM WORKER WHERE user = ". $_SESSION['userCode'].") 
                AND MONTH(payDate) IS NOT NULL
                AND total <> 0
        ) AS subquery
        GROUP BY 
            year, month";
        $dataset = $this->execquery($query);

        if ($dataset) {
            return $dataset;
        } else {
            echo "Error al ejecutar la consulta.";
            return false;
        }
    } else {
        echo "Error en la conexión a la base de datos.";
        return false;
    }
}
public function getDataByYear() {
    $result = $this->connect();
    if ($result) {
        $query = "SELECT 
            YEAR(payDate) as year, 
            SUM(total) as totalIncome 
        FROM SALARY 
        WHERE worker IN (SELECT code FROM WORKER WHERE user = ". $_SESSION['userCode'].") 
            AND YEAR(payDate) IS NOT NULL 
            AND total <> 0 
        GROUP BY year";
        $dataset = $this->execquery($query);

        if ($dataset) {
            return $dataset;
        } else {
            echo "Error al ejecutar la consulta.";
            return false;
        }
    } else {
        echo "Error en la conexión a la base de datos.";
        return false;
    }
}




public function getEmpleadoEntry($email){
    $result = $this->connect();
    if($result)
    {
        //echo"todo bien";
        $dataset = $this->execquery("select code from worker where user in (select code from user where email = '".$email."')");
    }
    else
    {
        echo"algo salio mal";
        $dataset = "error";
    }
    return $dataset;
}

public function getEnterpriseData($codeE){
    $result = $this->connect();
    if($result)
    {
        //echo"todo bien";
        $dataset = $this->execquery("select * from enterprise where code = ".$codeE."");
    }
    else
    {
        echo"algo salio mal";
        $dataset = "error";
    }
    return $dataset;
}

public function getEmpleadoData($codeW){
    $result = $this->connect();
    if($result)
    {
        //echo"todo bien";
        $dataset = $this->execquery("select * from worker where code = ".$codeW."");
        //echo "select * from worker where code = ".$codeW."";
    }
    else
    {
        echo"algo salio mal";
        $dataset = "error";
    }
    return $dataset;
}

public function getEmpleadoSalary($codeW){
    $result = $this->connect();
    if($result)
    {
        //echo"todo bien";
        $dataset = $this->execquery("select * from salary where worker = ".$codeW." and finished = 1");
        //echo "select * from worker where code = ".$codeW."";
    }
    else
    {
        echo"algo salio mal";
        $dataset = "error";
    }
    return $dataset;
}

public function getEmpleadoSalary_Benefits($codeW){
    $result = $this->connect();
    if($result)
    {
        //echo"todo bien";
        $dataset = $this->execquery("SELECT sum(sb.total) as total, s.finished from salary_benefits as sb INNER join salary as s on s.code = sb.salary where s.worker = ".$codeW);
        //echo "SELECT sum(sb.total) as total, s.finished from salary_benefits as sb INNER join salary as s on s.code = sb.salary where s.worker = ".$codeW;
    }
    else
    {
        echo"algo salio mal";
        $dataset = "error";
    }
    return $dataset;
}

public function getEmpleadoSalaryAll($codeW){
    $result = $this->connect();
    if($result)
    {
        //echo"todo bien";
        $dataset = $this->execquery("select * from salary where worker = ".$codeW);
        //echo "select * from worker where code = ".$codeW."";
    }
    else
    {
        echo"algo salio mal";
        $dataset = "error";
    }
    return $dataset;
}

public function getEmpleadoProfile($codeP){
    $result = $this->connect();
    if($result)
    {
        //echo"todo bien";
        $dataset = $this->execquery("select * from profile where code = ".$codeP);
        //echo "select * from worker where code = ".$codeW."";
    }
    else
    {
        echo"algo salio mal";
        $dataset = "error";
    }
    return $dataset;
}

public function getBenefits($codeS){
    $result = $this->connect();
    if($result)
    {
        //echo"todo bien";
        $dataset = $this->execquery("select sb.benefits, sb.salary, sb.total, b.name from salary_benefits as sb inner JOIN benefits as b on b.code = sb.benefits where sb.salary = ".$codeS);
        //echo "select * from worker where code = ".$codeW."";
    }
    else
    {
        echo"algo salio mal";
        $dataset = "error";
    }
    return $dataset;
}

public function entryInsert( $worker){
    $result = $this->connect();
    if($result)
    {
        $dataset = $this->execquery("Select * from weekinfo where salary in (select code from salary where worker =".$worker." and finished = 0)");
        if(date('N') == 1)
        {
            $diaSemana = 'monday';
        }else if(date('N') == 2){
            $diaSemana = 'tuesday';
        }else if(date('N') == 3){
            $diaSemana = 'wednesday';
        }else if (date('N') == 4 ) {
            $diaSemana = 'thursday';
        }else if (date('N')==5){
            $diaSemana = 'friday';
        }else if(date('N') == 6){
            $diasemana = 'saturday';
        }else if(date('N') == 7){
            $diaSemana = 'sunday';
        }

        while($tupla = mysqli_fetch_assoc($dataset))
        {
            if($tupla[$diaSemana.'Entry'] == null)
            {
                $this->execquery("update weekinfo set ".$diaSemana."Entry = NOW() where salary =".$tupla["salary"]);

            }else
            {
                $this->execquery("update weekinfo set ".$diaSemana."Exit = NOW() where salary =".$tupla["salary"]);
            }
        }
       
    }
    else
    {
        echo"algo salio mal";
        $dataset = "error";
    }
    return $dataset;
}

public function entryInsertSunday(){
    $result = $this->connect();
    if($result)
    {
        //echo"todo bien";
        $dataset = $this->execquery("update salary 
        set sunday = true");
    }
    else
    {
        echo"algo salio mal";
        $dataset = "error";
    }
    return $dataset;
}

public function insertISR($salary){
    $result = $this->connect();
    if($result)
    {
        //echo"todo bien";
        $dataset = $this->execquery("insert into salary_deductions values (1, ".$salary.")");
    }
    else
    {
        echo"algo salio mal";
        $dataset = "error";
    }
    return $dataset;
}


public function checkerInsert($days, $sunday, $worker, $workerID, $enterprise, $tardies )
{
    $result = $this->connect();
    if($result)
    {
        $consulta = "update salary set 
                        checkerDays = $days,
                        sunday = $sunday
                        where 
                        worker in (select code from worker where checkerName = '$worker' and checkerID = $workerID and enterprise = $enterprise)
                        and
                        finished = 0;    ";

        $consultaTardies = "update weekinfo set
                            tardies = $tardies
                            where salary in (select code from salary where worker in (select code from worker where checkerName = '$worker' and checkerID = $workerID and enterprise = $enterprise) and finished = 0)";
        $dataset = $this->execquery($consulta);
        $this->execquery($consultaTardies);
        echo  $consulta;
    }else
    {
        echo "algo salio mal";
        $dataset = "error";
    }
    return $dataset;
    
}

public function getCheckerInfo($worker)
{
    $result = $this->connect();
    if($result)
    {
        $consulta = "select s.checkerDays, s.sunday, w.tardies
        from salary as s
        inner join weekinfo as w on s.code = w.salary
        where w.salary = (select code from salary where worker = $worker and finished = 0)";
        $dataset = $this->execquery($consulta);
        //echo $consulta;
    }else
    {
        echo "algo salio mal";
        $dataset = "error";
    }
    return $dataset;
}

public function updateCheckerInfo($days,  $sunday, $tardies, $worker)
{
    $result = $this->connect();
    if($result)
    {
        $consulta = "update salary set 
                    checkerDays = $days,
                    sunday = $sunday
                    where worker  = $worker and finished = 0";
        echo $consulta."<br>";
        $this->execquery($consulta);
        $consulta2 = "update weekinfo set
                        tardies = $tardies where salary in (select code from salary where worker=$worker and finished=0)";
        echo $consulta2."<br>";
        $this->execquery($consulta2);
    }
}

public function getWeekInfo($worker)
{
    $result = $this->connect();
    if($result)
    {
        $consulta = "Select * from weekinfo where salary in (select code from salary where worker = $worker and finished = 0)";
        
        $dataset = $this->execQuery($consulta);
    }else
    {
        $dataset = "error";
    }
    return $dataset;
}

public function insertEntries($monday,$tuesday,$wednesday,$thursday,$friday,$saturday,$sunday, $worker)
{
    $result = $this->connect();
    if($result)
    {
        $consulta = "update weekinfo set
                    mondayEntry = '$monday',
                    tuesdayEntry = '$tuesday',
                    wednesdayEntry = '$wednesday',
                    thursdayEntry = '$thursday',
                    fridayEntry = '$friday',
                    saturdayEntry = '$saturday',
                    sundayEntry = '$sunday'
                    where salary in 
                    (select code from salary where worker = $worker and finished = 0)";
                    $this->execQuery( $consulta );
        echo $consulta;
    }
}

public function insertExits($monday,$tuesday,$wednesday,$thursday,$friday,$saturday,$sunday, $worker)
{
    $result = $this->connect();
    if($result)
    {
        $consulta = "update weekinfo set
                    mondayExit = '$monday',
                    tuesdayExit = '$tuesday',
                    wednesdayExit = '$wednesday',
                    thursdayExit = '$thursday',
                    fridayExit = '$friday',
                    saturdayExit = '$saturday',
                    sundayExit = '$sunday'
                    where salary in 
                    (select code from salary where worker = $worker and finished = 0)";
                    $this->execQuery( $consulta );
        echo $consulta;
    }
}

public function getWeekInfoAll()
{
    $result = $this->connect();
    if($result)
    {
        $consulta = "Select * from weekinfo where salary in (select code from salary where finished = 0)";
        
        $dataset = $this->execQuery($consulta);
    }else
    {
        $dataset = "error";
    }
    return $dataset;
}

public function closeWeek($days, $worker, $enterprise)
{
    $result = $this->connect();
    if($result)
    {
        $consulta = "update salary set
                    days = 2*(checkerDays + $days)
                    where worker = $worker and finished=0";
        echo $consulta;
        
        $this->execquery($consulta);
        $this->execQuery('CALL actualizarSalarios('.$enterprise.');');
    }
}
}
?>