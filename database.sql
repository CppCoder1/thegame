CREATE TABLE race
(
    id INT NOT NULL AUTO_INCREMENT,
    name TEXT NOT NULL,
    PRIMARY KEY(id),
    UNIQUE(name(100))
) Engine = InnoDB;

CREATE TABLE player
(
    id INT NOT NULL AUTO_INCREMENT,
    name TEXT NOT NULL,
    race_id INT NOT NULL,
    score INT NOT NULL DEFAULT 0,
    PRIMARY KEY(id),
    UNIQUE(name(100)),
    FOREIGN KEY(race_id) REFERENCES race(id)
) Engine = InnoDB;

--Insert new races
INSERT INTO race(name) VALUE("Ork");
INSERT INTO race(name) VALUE("Elf");
INSERT INTO race(name) VALUE("Human");