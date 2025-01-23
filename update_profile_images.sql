-- Update painters
UPDATE painters 
SET image = CASE 
    WHEN RAND() < 0.1 THEN 'People/download.jpg'
    WHEN RAND() < 0.2 THEN 'People/bangladesh-rangpur-june-24-2022-260nw-2279474879.jpg'
    WHEN RAND() < 0.3 THEN 'People/e7e74d1a25c3c95ea648f5b01a2d66e8.jpg'
    WHEN RAND() < 0.4 THEN 'People/scan0005 - Copy.jpg'
    WHEN RAND() < 0.5 THEN 'People/bb88d27dc9a113b5aacdada3297e3af1.jpg'
    WHEN RAND() < 0.6 THEN 'People/99547160965b8b7edef2cb81632ed2a9.jpg'
    WHEN RAND() < 0.7 THEN 'People/6b66ad421e92fddce0e755814a1b9215.jpg'
    WHEN RAND() < 0.8 THEN 'People/portrait-of-a-young-man-with-a-serious-expression-photo.jpg'
    WHEN RAND() < 0.9 THEN 'People/bangladeshi-people-portrait-in-dhaka-bangladesh-2NXJAY4.jpg'
    ELSE 'People/hardworking-newspaper-seller-bangladesh-2AA6XGR.jpg'
END;

-- Update electricians
UPDATE electricians 
SET profile_image = CASE 
    WHEN RAND() < 0.1 THEN 'People/download.jpg'
    WHEN RAND() < 0.2 THEN 'People/bangladesh-rangpur-june-24-2022-260nw-2279474879.jpg'
    WHEN RAND() < 0.3 THEN 'People/e7e74d1a25c3c95ea648f5b01a2d66e8.jpg'
    WHEN RAND() < 0.4 THEN 'People/scan0005 - Copy.jpg'
    WHEN RAND() < 0.5 THEN 'People/bb88d27dc9a113b5aacdada3297e3af1.jpg'
    WHEN RAND() < 0.6 THEN 'People/99547160965b8b7edef2cb81632ed2a9.jpg'
    WHEN RAND() < 0.7 THEN 'People/6b66ad421e92fddce0e755814a1b9215.jpg'
    WHEN RAND() < 0.8 THEN 'People/portrait-of-a-young-man-with-a-serious-expression-photo.jpg'
    WHEN RAND() < 0.9 THEN 'People/bangladeshi-people-portrait-in-dhaka-bangladesh-2NXJAY4.jpg'
    ELSE 'People/hardworking-newspaper-seller-bangladesh-2AA6XGR.jpg'
END;

-- Update plumbers
UPDATE plumbers 
SET image = CASE 
    WHEN RAND() < 0.1 THEN 'People/download.jpg'
    WHEN RAND() < 0.2 THEN 'People/bangladesh-rangpur-june-24-2022-260nw-2279474879.jpg'
    WHEN RAND() < 0.3 THEN 'People/e7e74d1a25c3c95ea648f5b01a2d66e8.jpg'
    WHEN RAND() < 0.4 THEN 'People/scan0005 - Copy.jpg'
    WHEN RAND() < 0.5 THEN 'People/bb88d27dc9a113b5aacdada3297e3af1.jpg'
    WHEN RAND() < 0.6 THEN 'People/99547160965b8b7edef2cb81632ed2a9.jpg'
    WHEN RAND() < 0.7 THEN 'People/6b66ad421e92fddce0e755814a1b9215.jpg'
    WHEN RAND() < 0.8 THEN 'People/portrait-of-a-young-man-with-a-serious-expression-photo.jpg'
    WHEN RAND() < 0.9 THEN 'People/bangladeshi-people-portrait-in-dhaka-bangladesh-2NXJAY4.jpg'
    ELSE 'People/hardworking-newspaper-seller-bangladesh-2AA6XGR.jpg'
END;

-- Update car_mechanics
UPDATE car_mechanics 
SET image = CASE 
    WHEN RAND() < 0.1 THEN 'People/download.jpg'
    WHEN RAND() < 0.2 THEN 'People/bangladesh-rangpur-june-24-2022-260nw-2279474879.jpg'
    WHEN RAND() < 0.3 THEN 'People/e7e74d1a25c3c95ea648f5b01a2d66e8.jpg'
    WHEN RAND() < 0.4 THEN 'People/scan0005 - Copy.jpg'
    WHEN RAND() < 0.5 THEN 'People/bb88d27dc9a113b5aacdada3297e3af1.jpg'
    WHEN RAND() < 0.6 THEN 'People/99547160965b8b7edef2cb81632ed2a9.jpg'
    WHEN RAND() < 0.7 THEN 'People/6b66ad421e92fddce0e755814a1b9215.jpg'
    WHEN RAND() < 0.8 THEN 'People/portrait-of-a-young-man-with-a-serious-expression-photo.jpg'
    WHEN RAND() < 0.9 THEN 'People/bangladeshi-people-portrait-in-dhaka-bangladesh-2NXJAY4.jpg'
    ELSE 'People/hardworking-newspaper-seller-bangladesh-2AA6XGR.jpg'
END;

-- Update locksmiths
UPDATE locksmiths 
SET image = CASE 
    WHEN RAND() < 0.1 THEN 'People/download.jpg'
    WHEN RAND() < 0.2 THEN 'People/bangladesh-rangpur-june-24-2022-260nw-2279474879.jpg'
    WHEN RAND() < 0.3 THEN 'People/e7e74d1a25c3c95ea648f5b01a2d66e8.jpg'
    WHEN RAND() < 0.4 THEN 'People/scan0005 - Copy.jpg'
    WHEN RAND() < 0.5 THEN 'People/bb88d27dc9a113b5aacdada3297e3af1.jpg'
    WHEN RAND() < 0.6 THEN 'People/99547160965b8b7edef2cb81632ed2a9.jpg'
    WHEN RAND() < 0.7 THEN 'People/6b66ad421e92fddce0e755814a1b9215.jpg'
    WHEN RAND() < 0.8 THEN 'People/portrait-of-a-young-man-with-a-serious-expression-photo.jpg'
    WHEN RAND() < 0.9 THEN 'People/bangladeshi-people-portrait-in-dhaka-bangladesh-2NXJAY4.jpg'
    ELSE 'People/hardworking-newspaper-seller-bangladesh-2AA6XGR.jpg'
END;

-- Update battery_services
UPDATE battery_services 
SET image = CASE 
    WHEN RAND() < 0.1 THEN 'People/download.jpg'
    WHEN RAND() < 0.2 THEN 'People/bangladesh-rangpur-june-24-2022-260nw-2279474879.jpg'
    WHEN RAND() < 0.3 THEN 'People/e7e74d1a25c3c95ea648f5b01a2d66e8.jpg'
    WHEN RAND() < 0.4 THEN 'People/scan0005 - Copy.jpg'
    WHEN RAND() < 0.5 THEN 'People/bb88d27dc9a113b5aacdada3297e3af1.jpg'
    WHEN RAND() < 0.6 THEN 'People/99547160965b8b7edef2cb81632ed2a9.jpg'
    WHEN RAND() < 0.7 THEN 'People/6b66ad421e92fddce0e755814a1b9215.jpg'
    WHEN RAND() < 0.8 THEN 'People/portrait-of-a-young-man-with-a-serious-expression-photo.jpg'
    WHEN RAND() < 0.9 THEN 'People/bangladeshi-people-portrait-in-dhaka-bangladesh-2NXJAY4.jpg'
    ELSE 'People/hardworking-newspaper-seller-bangladesh-2AA6XGR.jpg'
END;

-- Update packers_movers
UPDATE packers_movers 
SET image = CASE 
    WHEN RAND() < 0.1 THEN 'People/download.jpg'
    WHEN RAND() < 0.2 THEN 'People/bangladesh-rangpur-june-24-2022-260nw-2279474879.jpg'
    WHEN RAND() < 0.3 THEN 'People/e7e74d1a25c3c95ea648f5b01a2d66e8.jpg'
    WHEN RAND() < 0.4 THEN 'People/scan0005 - Copy.jpg'
    WHEN RAND() < 0.5 THEN 'People/bb88d27dc9a113b5aacdada3297e3af1.jpg'
    WHEN RAND() < 0.6 THEN 'People/99547160965b8b7edef2cb81632ed2a9.jpg'
    WHEN RAND() < 0.7 THEN 'People/6b66ad421e92fddce0e755814a1b9215.jpg'
    WHEN RAND() < 0.8 THEN 'People/portrait-of-a-young-man-with-a-serious-expression-photo.jpg'
    WHEN RAND() < 0.9 THEN 'People/bangladeshi-people-portrait-in-dhaka-bangladesh-2NXJAY4.jpg'
    ELSE 'People/hardworking-newspaper-seller-bangladesh-2AA6XGR.jpg'
END;

-- Update tv_repair
UPDATE tv_repair 
SET profile_image = CASE 
    WHEN RAND() < 0.1 THEN 'People/download.jpg'
    WHEN RAND() < 0.2 THEN 'People/bangladesh-rangpur-june-24-2022-260nw-2279474879.jpg'
    WHEN RAND() < 0.3 THEN 'People/e7e74d1a25c3c95ea648f5b01a2d66e8.jpg'
    WHEN RAND() < 0.4 THEN 'People/scan0005 - Copy.jpg'
    WHEN RAND() < 0.5 THEN 'People/bb88d27dc9a113b5aacdada3297e3af1.jpg'
    WHEN RAND() < 0.6 THEN 'People/99547160965b8b7edef2cb81632ed2a9.jpg'
    WHEN RAND() < 0.7 THEN 'People/6b66ad421e92fddce0e755814a1b9215.jpg'
    WHEN RAND() < 0.8 THEN 'People/portrait-of-a-young-man-with-a-serious-expression-photo.jpg'
    WHEN RAND() < 0.9 THEN 'People/bangladeshi-people-portrait-in-dhaka-bangladesh-2NXJAY4.jpg'
    ELSE 'People/hardworking-newspaper-seller-bangladesh-2AA6XGR.jpg'
END; 