#1.	Viết lệnh sql để có thể lấy thông tin những bản ghi của categories và số lượng items của mỗi categories đó (count items)
	SELECT * FROM `items`;

	SELECT COUNT(id)
	FROM items;

	SELECT * FROM `categories`;

	SELECT COUNT(id)
	FROM categories;
	
#2.	Viết lệnh sql để có thể lấy thông tin những bản ghi của categories và tổng số amount của các items trong categories đó (sum items.amount)
	
	SELECT SUM(amount)
	FROM items;

#3.	Viết lệnh sql để có thể lấy thông tin những bản ghi của categories mà có ít nhất một items của nó có amount > 40
	
	SELECT * FROM `items`
	WHERE items.amount > 40;

#4.	Viết lệnh sql để xóa những categories mà đang không có items nào
	
	DELETE FROM items
	WHERE amount=NULL;
