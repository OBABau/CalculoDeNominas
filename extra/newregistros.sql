create table weekInfo(
    code int primary key auto_increment,
    mondayEntry datetime,
    mondayExit  datetime,
    tuesdayEntry datetime,
    tuesdayExit datetime,
    wednesdayEntry datetime,
    wednesdayExit datetime,
    thursdayentry datetime,
    thursdayExit datetime,
    fridayEntry datetime,
    fridayExit datetime,
    saturdayEntry datetime,
    saturdayExit datetime,
    sundayEntry datetime,
    sundayExit datetime,
    salary int,
    foreign key (salary) references salary(code)
)

alter table `weekinfo` add column tardies int not null

DELIMITER $$
create trigger after_salary_create_weekinfo after insert on salary for each row begin
insert into weekInfo (salary) values (new.code);
end$$

alter table `worker` add column checkerName varchar(15) not null
alter table `worker` add column checkerID int not null
alter table `salary` add column checkerDays int not null

DELIMITER $$

CREATE PROCEDURE actualizarSalarios(int empresa)
BEGIN
    -- Actualizar el campo total de la tabla salary para los empleados de la empresa específica
    UPDATE salary AS s
    SET s.total = (s.days / 2) * (SELECT income FROM profile WHERE code = s.profile)
    WHERE s.enterprise = empresa;

    -- Incrementar el campo finished en 1 para los empleados de la empresa específica
    UPDATE salary
    SET finished = finished + 1
    WHERE enterprise = empresa;

    -- Insertar nuevos registros en la tabla salary para los empleados de la empresa específica
    INSERT INTO salary (worker, days, payDate, enterprise, profile, finished)
    SELECT code, 0, CURRENT_TIMESTAMP, enterprise, profile, 0
    FROM worker
    WHERE enterprise = empresa;
END


DELIMITER ;
