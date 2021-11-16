INSERT INTO cats(name)
VALUES ('Laptops'),
    ('PCs'),
    ('Mobiles');
INSERT INTO products(name, `desc`, price, pieces_on, img, cat_id)
VALUES (
        'lenovo',
        'this is dummy descrption for prodect',
        15000,
        10,
        '1.jpg',
        1
    ),
    (
        'dell',
        'this is dummy descrption for prodect',
        10000,
        10,
        '2.jpg',
        1
    ),
    (
        'Hp',
        'this is dummy descrption for prodect',
        8000,
        8,
        '3.jpg',
        1
    ),
    (
        'lenovo',
        'this is dummy descrption for prodect',
        13000,
        5,
        '4.jpg',
        1
    ),
    (
        'pc 123',
        'this is dummy descrption for prodect',
        5000,
        5,
        '5.jpg',
        2
    ),
    (
        'pc 456',
        'this is dummy descrption for prodect',
        6000,
        5,
        '6.jpg',
        2
    ),
    (
        'pc 789',
        'this is dummy descrption for prodect',
        7000,
        5,
        '7.jpg',
        2
    ),
    (
        'samsung',
        'this is dummy descrption for prodect',
        5000,
        5,
        '8.jpg',
        2
    ),
    (
        'oppo',
        'this is dummy descrption for prodect',
        5500,
        5,
        '9.jpg',
        2
    ),
    (
        'hwawei',
        'this is dummy descrption for prodect',
        5200,
        5,
        '10.jpg',
        2
    );
INSERT INTO admins(name, email, password)
VALUES
('abdo hossam','abdo@admin.com','$2y$10$pqGKtbP.6pfATWlTp405X.VI4sde4zpYuyWaC4Hg/hvUa1ZtoSuNa');