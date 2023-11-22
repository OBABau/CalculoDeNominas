INSERT INTO USER_TYPE VALUES (1,'admin');
INSERT INTO USER_TYPE VALUES (2,'employee');
INSERT INTO USER_TYPE VALUES (3,'enterprise');

INSERT INTO USER (email, password, creationDate, userType) VALUES ('usuario1@example.com', '123', '2023-10-23', 1);
INSERT INTO USER (email, password, creationDate, userType) VALUES ('usuario2@example.com', '123', '2023-10-23', 2);
INSERT INTO USER (email, password, creationDate, userType) VALUES ('usuario3@example.com', '123', '2023-10-23', 3);

alter table user
add column active boolean

select code from enterprise where user in (select code from user where email = "axiscompany@gmail.com" and password = "elejecentraldelatecnologia" );

DELIMITER //

CREATE TRIGGER CreateProfileRelationships
AFTER INSERT ON PROFILE
FOR EACH ROW
BEGIN
    
    INSERT INTO PROFILE_INCOMES (incomes, profile, status)
    SELECT I.code, NEW.code, NULL
    FROM INCOMES I;

    -- Crear registros en PROFILE_BENEFITS
    INSERT INTO PROFILE_BENEFITS (benefits, profile, status)
    SELECT B.code, NEW.code, NULL
    FROM BENEFITS B;
END;
//


DELIMITER//
CREATE TRIGGER trg_incomes_insert
AFTER INSERT
ON INCOMES
FOR EACH ROW
BEGIN
    INSERT INTO PROFILE_INCOMES(incomes, profile, status)
    SELECT NEW.code, P.code, NULL
    FROM PROFILE P
    WHERE P.enterprise = NEW.enterprise;
END;
//

DELIMITER //
CREATE TRIGGER trg_benefits_insert
AFTER INSERT
ON BENEFITS
FOR EACH ROW
BEGIN
    INSERT INTO PROFILE_BENEFITS(benefits, profile, status)
    SELECT NEW.code, P.code, NULL
    FROM PROFILE P
    WHERE P.enterprise = NEW.enterprise;
END;

//



CREATE TABLE Payments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    cardNumber VARCHAR(16) NOT NULL,
    cvv varchar(3) NOT NULL,
    expirationDate VARCHAR(5) NOT NULL
);

ALTER TABLE Payments
ADD COLUMN user_id INT,
ADD FOREIGN KEY (user_id) REFERENCES user(code);

DELIMITER //
CREATE TRIGGER after_insert_payment
AFTER INSERT ON Payments
FOR EACH ROW
BEGIN
    UPDATE user
    SET active = 1
    WHERE code = NEW.user_id;
END;
//
DELIMITER ;

alter table `benefits`
add column amount float

alter table `incomes`
add column amount float

alter table worker
modify column user int

alter table user
add column worker int,
add foreign key (`worker`) references `worker`(`code`)

DELIMITER //
CREATE TRIGGER trg_worker_insert
AFTER INSERT
ON user
FOR EACH ROW
BEGIN
    IF NEW.worker IS NOT NULL THEN
        UPDATE worker
        SET user = NEW.code
        WHERE code = NEW.worker;
    END IF;
END;
//

alter table `worker`
add column profile int,
add foreign key (profile) references profile(code)

alter table `salary`
add column finished boolean

DELIMITER //
CREATE EVENT update_salary_finished
ON SCHEDULE EVERY 1 WEEK
STARTS '2023-11-13 05:00:00'
DO
BEGIN
    -- Actualizar el valor de finished en la tabla salary
    update salary as s
    set s.total = (days/2)*(select income from profile where code = s.profile);

    UPDATE salary
    SET finished = TRUE;

    -- Insertar nuevos registros en la tabla salary
    INSERT INTO salary (worker, enterprise, profile, finished)
    SELECT code, enterprise, profile, FALSE
    FROM worker;
END;
//



SET GLOBAL event_scheduler = ON;

alter table salary
change hours days int

<<<<<<< HEAD
alter table profile
add column salary float
=======
ALTER TABLE WORKER
ADD COLUMN active BOOLEAN DEFAULT 1;

>>>>>>> origin/cambios-tarde-del-21
