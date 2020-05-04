Simple Form Builder
============

Form builder created with jQuery v1.10 &amp; Bootstrap v3.1 &amp;  SQLite &amp; PHP

## Database Schema

```sql
CREATE TABLE anketler
(ID INT PRIMARY KEY     NOT NULL AUTOINCREMENT,
USER           TEXT    NOT NULL,
ANKET            TEXT     NOT NULL,
MAIL        TEXT)
```

## Example Files

```
db/
|--- result-1.csv
|--- result-2.csv
|--- result-3.csv
|--- survey.db
```

## Change History (V3.1)
- Added SQLite form db
- Added form adder script
- Added show survey with id
- Added results to csv file

## TODO
- Installer script
- Get label name and store them
- Store RAW form data
- Editable forms