

DROP TABLE IF EXISTS my_recipes;
CREATE TABLE my_recipes (
  id INT(11) NOT NULL AUTO_INCREMENT,
  name VARCHAR(30) NOT NULL,
  instructions TEXT,
	PRIMARY KEY(id)
);


INSERT INTO my_recipes (name, instructions)
	VALUES ('PB&J', 'figure it out');
INSERT INTO my_recipes (name, instructions)
	VALUES ('morning toast', "isn\'t it obvious?");

SELECT * FROM my_recipes;

/*
	Ingredients Table
*/
DROP TABLE IF EXISTS ingredients;
CREATE TABLE ingredients (
  id INT(11) NOT NULL AUTO_INCREMENT,
  ingred_name VARCHAR(30) NOT NULL,
  brand VARCHAR(30) DEFAULT 'none',
	PRIMARY KEY(id)
);

INSERT INTO ingredients (ingred_name)
	VALUES ('peanut butter');
INSERT INTO ingredients (ingred_name)
	VALUES ('jelly');
INSERT INTO ingredients (ingred_name)
	VALUES ('bread');
INSERT INTO ingredients (ingred_name)
	VALUES ('butter');

SELECT * FROM ingredients;

/*
	junction Table
*/
DROP TABLE IF EXISTS ingredients_in_recipes;
CREATE TABLE ingredients_in_recipes (
  ingred_id INT(30),
  recipe_id INT(30),
  amt VARCHAR(30)
);

INSERT INTO ingredients_in_recipes (ingred_id, recipe_id, amt)
  VALUES (1, 1, '2 Tblsp');
INSERT INTO ingredients_in_recipes (ingred_id, recipe_id, amt)
  VALUES (2, 1, '1 Tblsp');
INSERT INTO ingredients_in_recipes (ingred_id, recipe_id, amt)
  VALUES (3, 1, '2 slices');
INSERT INTO ingredients_in_recipes (ingred_id, recipe_id, amt)
  VALUES (4, 2, '1/2 Tblsp');
INSERT INTO ingredients_in_recipes (ingred_id, recipe_id, amt)
  VALUES (3, 2, '1 slice');
INSERT INTO ingredients_in_recipes (ingred_id, recipe_id, amt)
  VALUES (2, 2, '1/2 Tblsp');


SELECT * FROM ingredients_in_recipes; 

/*
	list all ingredients in recipe 1
*/
SELECT ingred_name FROM ingredients
  INNER JOIN (SELECT ingred_id FROM ingredients_in_recipes WHERE recipe_id = 1) ir
  ON id = ir.ingred_id;