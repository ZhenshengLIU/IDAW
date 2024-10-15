# User Control API Doucment

## 1. get all users infos

- **URL**: `/users.php`
- **method**: `GET`
- **response**: return a json contain all infos

## 2. create new user

- **URL**: `/users.php`
- **method**: `POST`
- **Request body**:
    ```json
    {
        "name": "name",
        "email": "email"
    }
    ```
- **response**:
    - when succeed return `201 Created` and id
    - when error return `400 Bad Request`。

## 3.  edit user

- **URL**: `/users.php`
- **method**: `PUT`
- **request body**:
    ```json
    {
        "id": "ID",
        "name": "new name",
        "email": "new email"
    }
    ```
- **response**:
    - when succeed return `200 OK`。
    - cant find the user with input id `404 Not Found`。

## 4. delete user

- **URL**: `/users.php`
- **method**: `DELETE`
- **request body**:
    ```json
    {
        "id": "ID"
    }
    ```
- **response**:
    - when succed return `204 No Content`。
    - cant find the user with input id `404 Not Found`。
