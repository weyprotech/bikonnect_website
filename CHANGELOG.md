# Changelog

All notable changes to this project will be documented in this file.


## 2019-12-18

### Changed
- url::route使用https並非http-forceScheme在laravel5.4後更換名稱
- 後台圖片上傳會刪除原本圖片

## 2019-11-21

### Changed

- SEO優化
- Solution頁> Key Features 要有圖片更換功能
- 關於我們>新增沿革的排序，刪除排序1之後，排序從2~結束，沒有1
- 後台首頁編輯
- 聯絡我們區域要可編輯-換信箱、地址
- 後台要有可設定同步收件Mail的功能
- 可新增編輯刪除多組收件信箱
- 後台可收信與回復Mail
- 後台要可以更新隱私權政策
- 上傳圖片

## 2019-12-23

### Changed

-新增條款後台

app/Http/Controllers/Backend/TermController.php

app/TermLangModel.php

app/TermModel.php

resources/views/backend/term  (整個資料夾)

-匯入SQL檔

tb_term.sql

-前台顯示

app/Http/Controllers/Frontend/MainController.php

resources/views/frontend/term.blade.php

resources/views/frontend/shared/_footer.blade.php

-連結修正

routes/web.php

-修正後台內文4頁面

resources/views/backend/homepage/content4/edit.blade.php

-修改後台menu連結

resources/views/backend/shared/_nav.blade.php

-刪除會刪除圖片

app/Http/Controllers/Backend/AboutController.php

app/Http/Controllers/Backend/BannerController.php

app/Http/Controllers/Backend/BlogController.php

app/Http/Controllers/Backend/ProductController.php

app/Http/Controllers/Backend/SolutionController.php

app/Http/Controllers/Backend/Homepage/Content2Controller.php
