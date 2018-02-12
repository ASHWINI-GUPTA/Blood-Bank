-- -------------------------------------------
-- Create User table
--
-- PK - id
-- -------------------------------------------

CREATE TABLE IF NOT EXISTS users
(
  id          INT AUTO_INCREMENT
    PRIMARY KEY,
  username    VARCHAR(50) NOT NULL,
  email       VARCHAR(50) NOT NULL,
  password    VARCHAR(50) NOT NULL,
  trn_date    DATETIME    NOT NULL,
  role        VARCHAR(50) NOT NULL,
  name        VARCHAR(50) NOT NULL,
  blood_group VARCHAR(10) NOT NULL
)
  ENGINE = InnoDB;

-- -------------------------------------------
-- Create Blood Index table to store Blood Type
--
-- PK - id
-- FK - hospital_id
-- -------------------------------------------

CREATE TABLE IF NOT EXISTS blood_index
(
  id            INT AUTO_INCREMENT
    PRIMARY KEY,
  blood_group   VARCHAR(10)  NOT NULL,
  hospital_name VARCHAR(100) NOT NULL,
  hospital_id   INT          NOT NULL,
  CONSTRAINT blood_index_id_uindex
  UNIQUE (id)
)
  ENGINE = InnoDB;

-- -------------------------------------------
-- Create Request Table to keep track of
-- who is requesting and for what?
--
-- PK - id
-- FK - user_id, blood_id
-- -------------------------------------------

CREATE TABLE IF NOT EXISTS request_table
(
  id            INT AUTO_INCREMENT
    PRIMARY KEY,
  user_id       INT         NOT NULL,
  blood_id      INT         NOT NULL,
  user_name     VARCHAR(50) NOT NULL,
  blood_group   VARCHAR(50) NOT NULL,
  hospital_name VARCHAR(50) NOT NULL,
  hospital_id   INT         NOT NULL,
  email         VARCHAR(50) NOT NULL,
  CONSTRAINT request_table_id_uindex
  UNIQUE (id),
  CONSTRAINT request_table_blood_index_id_fk
  FOREIGN KEY (blood_id) REFERENCES blood_index (id)
)
  ENGINE = InnoDB;


CREATE INDEX blood_index_users_id_fk
  ON blood_index (hospital_id);

CREATE INDEX request_table_users_id_fk
  ON request_table (user_id);

CREATE INDEX request_table_blood_index_id_fk
  ON request_table (blood_id);

ALTER TABLE blood_index
  ADD CONSTRAINT blood_index_users_id_fk
FOREIGN KEY (hospital_id) REFERENCES users (id);

ALTER TABLE request_table
  ADD CONSTRAINT request_table_users_id_fk
FOREIGN KEY (user_id) REFERENCES users (id);
