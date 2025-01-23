-- Update tv_repair table images
UPDATE tv_repair 
SET profile_image = (
    SELECT image_path 
    FROM (
        SELECT 'People/download.jpg' as image_path
        UNION SELECT 'People/bangladesh-rangpur-june-24-2022-260nw-2279474879.jpg'
        UNION SELECT 'People/e7e74d1a25c3c95ea648f5b01a2d66e8.jpg'
        UNION SELECT 'People/scan0005 - Copy.jpg'
        UNION SELECT 'People/bb88d27dc9a113b5aacdada3297e3af1.jpg'
        UNION SELECT 'People/99547160965b8b7edef2cb81632ed2a9.jpg'
        UNION SELECT 'People/6b66ad421e92fddce0e755814a1b9215.jpg'
        UNION SELECT 'People/portrait-of-a-young-man-with-a-serious-expression-photo.jpg'
        UNION SELECT 'People/bangladeshi-people-portrait-in-dhaka-bangladesh-2NXJAY4.jpg'
        UNION SELECT 'People/hardworking-newspaper-seller-bangladesh-2AA6XGR.jpg'
    ) AS images
    ORDER BY RAND()
    LIMIT 1
); 