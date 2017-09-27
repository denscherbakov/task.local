###Задача 1
#####Задание 1
SELECT Department, COUNT(*) as Count_personal 
FROM task1_emp 
GROUP BY Department;
#####Задание 2
SELECT Department
FROM task1_emp 
WHERE Age > 35
GROUP BY Department
HAVING COUNT(Name) > 3
###Задача 2
#####Задание 1
SELECT author.Name, COUNT(news.NewsID) as Count_news
FROM task2_author as author 
LEFT JOIN task2_news as news 
ON news.AuthorID = author.AuthorID 
GROUP BY author.Name;
#####Задание 2
SELECT author.Name
FROM task2_author as author 
LEFT JOIN task2_news as news 
ON news.AuthorID = author.AuthorID 
GROUP BY author.Name 
HAVING COUNT(news.NewsID) = 0
###Задача 3
SELECT Email, COUNT(Email) as Count
FROM task3 
GROUP BY Email
HAVING COUNT(Email) > 2
###Задача 4
SELECT current.ID + 1 as unknown_number
FROM task4 as current
LEFT JOIN task4 as next ON next.ID = current.ID + 1
WHERE next.ID IS NULL
LIMIT 1;