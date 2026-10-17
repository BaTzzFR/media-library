DROP TABLE IF EXISTS book, author;

CREATE TABLE author (
    id   SERIAL PRIMARY KEY,
    name TEXT NOT NULL UNIQUE
);

CREATE TABLE book (
    id        SERIAL PRIMARY KEY,
    title     TEXT NOT NULL,
    year      SMALLINT NOT NULL,
    category  TEXT NOT NULL,
    author_id INT NOT NULL REFERENCES author(id) ON DELETE CASCADE
);

INSERT INTO author (name) VALUES
    ('Frank Herbert'),
    ('George Orwell'),
    ('Antoine de Saint-Exupéry');

INSERT INTO book (title, year, category, author_id) VALUES
    ('Dune',            1965, 'Science-fiction',
    (SELECT id FROM author WHERE name = 'Frank Herbert')),
    ('1984',            1949, 'Dystopie',
    (SELECT id FROM author WHERE name = 'George Orwell')),
    ('Le Petit Prince', 1943, 'Conte philosophique',
    (SELECT id FROM author WHERE name = 'Antoine de Saint-Exupéry'));
