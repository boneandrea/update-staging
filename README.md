# What

staging環境を更新する  
(CakePHPプロジェクト用)

更新時にChatworkへも通知する

# requirements

- PHP 8.x
- Chatwork API KEY
- CMD(login & exec command tool)

# Configure
 
edit .env
```
# API token
# https://www.chatwork.com/service/packages/chatwork/subpackages/api/token.php
API_TOKEN=
```

Create `../.env` at the project top directory (where composer.json exists)
```
ROOM_ID=__CHATWORK_ROOM_ID__ # https://www.chatwork.com/#!ridNNNNNNN -> NNNNNNN
WORKDIR=__project_top_directory_name__
```

# Run
In project directory:
```
../STG_UP
```
