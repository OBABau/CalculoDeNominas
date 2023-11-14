INSERT INTO USER_TYPE VALUES (1,'admin');
INSERT INTO USER_TYPE VALUES (2,'employee');
INSERT INTO USER_TYPE VALUES (3,'enterprise');

drop `user_type`

INSERT INTO USER (email, password, creationDate, userType) VALUES ('usuario1@example.com', '123', '2023-10-23', 1);
INSERT INTO USER (email, password, creationDate, userType) VALUES ('usuario2@example.com', '123', '2023-10-23', 2);
INSERT INTO USER (email, password, creationDate, userType) VALUES ('usuario3@example.com', '123', '2023-10-23', 3);

update table `enterprise`
set user = null
where code = 1;

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

DELIMITER ;

