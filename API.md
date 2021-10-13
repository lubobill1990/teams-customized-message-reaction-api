Table
```
id
emoji_url
emoji_id
created_at
user_id
message_id
chat_id
```
HOST https://www.l2b.ltd/

POST /message-reactions
```json
{
    "emoji_url": "https://emojis.slackmojis.com/emojis/images/1597609813/10031/60fps_parrot.gif?1597609813",
    "emoji_id": "60fps_parrot",
    "user_id": "aa2a7b29-715b-401c-aa01-d0df2b8a08b5",
    "message_id": "1634025448539",
    "chat_id": "19:7968c7b8-39f2-4f20-99a1-17681815d5f0_aa2a7b29-715b-401c-aa01-d0df2b8a08b5"
}
```
Response
201
```json
{
    "id": 1413,
    "emoji_url": "https://emojis.slackmojis.com/emojis/images/1597609813/10031/60fps_parrot.gif?1597609813",
    "emoji_id": "60fps_parrot",
    "user_id": "aa2a7b29-715b-401c-aa01-d0df2b8a08b5",
    "message_id": "1634025448539",
    "chat_id": "19:7968c7b8-39f2-4f20-99a1-17681815d5f0_aa2a7b29-715b-401c-aa01-d0df2b8a08b5",
    "created_at": "2021-10-12T09:21:22.000000Z"
}
```

DELETE /message-reactions/1413
Response
200

GET /message-reactions?chat_id=19:7968c7b8-39f2-4f20-99a1-17681815d5f0_aa2a7b29-715b-401c-aa01-d0df2b8a08b5
Response
200
```json
[
    {
        "id": 1413,
        "emoji_url": "https://emojis.slackmojis.com/emojis/images/1597609813/10031/60fps_parrot.gif?1597609813",
        "emoji_id": "60fps_parrot",
        "user_id": "aa2a7b29-715b-401c-aa01-d0df2b8a08b5",
        "message_id": "1634025448539",
        "chat_id": "19:7968c7b8-39f2-4f20-99a1-17681815d5f0_aa2a7b29-715b-401c-aa01-d0df2b8a08b5",
        "created_at": "2021-10-12T09:21:22.000000Z"
    },
]
```
