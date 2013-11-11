DROP TABLE IF EXISTS country CASCADE;
CREATE TABLE country (
  id serial NOT NULL,
  name varchar(20) NOT NULL,
  PRIMARY KEY (id)
);

INSERT INTO country (id, name) VALUES
(1, 'Slovakia');

SELECT setval('country_id_seq'::regclass, (SELECT MAX(id) FROM country));

DROP TYPE IF EXISTS user_type CASCADE;
DROP TABLE IF EXISTS author CASCADE;
CREATE TYPE user_type AS ENUM ('admin', 'author');
CREATE TABLE author (
  id serial NOT NULL,
  country_id int NOT NULL,
  user_type user_type NOT NULL,
  name varchar(20) NOT NULL,
  PRIMARY KEY (id),
  CONSTRAINT author_ibfk_1 FOREIGN KEY (country_id) REFERENCES country (id)
);

INSERT INTO author (id, country_id, user_type, name) VALUES
(1, 1,  'admin',    'Marek'),
(2, 1,  'author',   'Robert');

SELECT setval('author_id_seq'::regclass, (SELECT MAX(id) FROM author));

DROP TABLE IF EXISTS article CASCADE;
CREATE TABLE article (
  id serial NOT NULL,
  author_id int NOT NULL,
  published_at TIMESTAMP NOT NULL DEFAULT now(),
  title varchar(100) NOT NULL DEFAULT '',
  content text NOT NULL DEFAULT '',
  PRIMARY KEY (id),
  CONSTRAINT article_ibfk_1 FOREIGN KEY (author_id) REFERENCES author (id)
);

INSERT INTO article (id, author_id, published_at, title, content) VALUES
(1, 1,  '2011-12-10 12:10:00',  'article 1',    'content 1'),
(2, 2,  '2011-12-20 16:20:00',  'article 2',    'content 2'),
(3, 1,  '2012-01-04 22:00:00',  'article 3',    'content 3');

SELECT setval('article_id_seq'::regclass, (SELECT MAX(id) FROM article));

DROP TABLE IF EXISTS opinion CASCADE;
CREATE TABLE opinion (
  id serial NOT NULL,
  article_id int NOT NULL,
  author_id int NOT NULL,
  content varchar(100) NOT NULL,
  PRIMARY KEY (id),
  CONSTRAINT opinion_ibfk_1 FOREIGN KEY (article_id) REFERENCES article (id),
  CONSTRAINT opinion_ibfk_2 FOREIGN KEY (author_id) REFERENCES author (id)
);

INSERT INTO opinion (id, article_id, author_id, content) VALUES
(1, 1,  2,  'opinion 1.1'),
(2, 1,  1,  'opinion 1.2'),
(3, 2,  1,  'opinion 2.1');

SELECT setval('opinion_id_seq'::regclass, (SELECT MAX(id) FROM opinion));
