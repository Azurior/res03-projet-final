## table : 

- media : id int, url string(1023), description string(2047) 
- articles : id int, title string(255), temps string(255), description string(2047), id_media int, id_comments int
- comments : id int, description string(8188), id_users int
- users : id int, user string(255), email string(255), password string(1023)
- categories : id int, title string (255), id_articles, id_media
- projects : id int, title string (255), id_categories
- devis-wallpaper : id int, theme string(1023), primary_color string(255), second_color string(255), option1_color ?string(255), option2_color ?string(255), option3_color ?string(255), text string(1023), image string(255), size_project string(255), id_users int
- devis-logo : id int, theme string(1023), primary_color string(255), second_color string(255), option1_color ?string(255), option2_color ?string(255), option3_color ?string(255), text string(255), image string(255), size_project string(255), id_user int
- devis-scene : id int, number_scene int, description string (1023), primary_color string(255), second_color ?string(255), option1_color ?string(255), option2_color ?string(255), option3_color ?string(255), text string(255), image string(255), size_project string(255), id_user int





## lien : 

users => devis

users <=> comments

posts => articles

articles => media

categories => media

project <=> category





