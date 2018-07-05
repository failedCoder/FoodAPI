## MealAPI

This api is for fetching meals from a database with url queries.

## List of accepted parameters
<ul>
  <li><strong>lang</strong> (required): models are multilingual so this param is required to fetch specific translations</li>
  <li><strong>per_page</strong> (optional): paginates the response</li>
  <li><strong>page</strong> (optional): selects the page of paginated response</li>
  <li><strong>category</strong> (optional): filters meal based on their category id,options are:
    <ul>
    <li>null: returns all meals that don't have a defined category</li>
    <li>!null: returns all meals that have a defined category</li>
    <li>integer(example:2): returns all meals that have category with an id of 2</li>
    </ul>
  </li>
  <li><strong>tags</strong> (optional): returns meals that have all of the tags in this parametar,for example
  <ul>
    <li>tags=1,2 will return all meals that have tags with the id of 1 AND id of 2</li>
  </ul>
   <li><strong>with</strong> (optional): list of key-words that specify the extra information we want to return about meals,available key-words:
  <ul>
    <li>category: details about meal category are included in the response</li>
    <li>tags: details about all of the tags that a meal has are included in the response</li>
    <li>ingredients: details about all of the ingredients that a meal has are included in the response</li>
  </ul>
  </li>
  </li>
   <li><strong>diff_time</strong> (optional):timestamp,when this parametar is passed,all of meals are returned,even deleted ones,and their status is set to created,modified or deleted depending on whether such actions were taken on them after the timestamp provided</li>
</ul>

## Other features:

<ul>
  <li>Multilingual models (laravel-translatable package)</li>
  <li>Database seeding with laravel factory models</li>
  <li>Request validation with laravel form requests</li>
  <li>Fetching results with laravel api resurces</li>
</ul>

Example query:
<p>http://localhost:8888/api/query?lang=en&category=!null&per_page=10&page=2&with=category,tags,ingredients</p>

Example response:
<pre>
{
"data": [
{
"id": 16,
"category_id": 7,
"status": "created",
"title": "Title for meal-6 on en language",
"description": "Description for meal-6 on en language",
"ingredients": [
{
"id": 20,
"slug": "INGREDIENT-10",
"title": "Title for ingredient-10 on en language"
}
],
"category": {
"id": 7,
"slug": "CATEGORY-2",
"title": "Title for category-2 on en language"
},
"tags": [
{
"id": 6,
"slug": "TAG-1",
"title": "Title for tag-1 on en language"
},
{
"id": 8,
"slug": "TAG-3",
"title": "Title for tag-3 on en language"
},
{
"id": 10,
"slug": "TAG-5",
"title": "Title for tag-5 on en language"
}
]
},
{
"id": 19,
"category_id": 8,
"status": "created",
"title": "Title for meal-9 on en language",
"description": "Description for meal-9 on en language",
"ingredients": [
{
"id": 17,
"slug": "INGREDIENT-7",
"title": "Title for ingredient-7 on en language"
},
{
"id": 19,
"slug": "INGREDIENT-9",
"title": "Title for ingredient-9 on en language"
},
{
"id": 20,
"slug": "INGREDIENT-10",
"title": "Title for ingredient-10 on en language"
}
],
"category": {
"id": 8,
"slug": "CATEGORY-3",
"title": "Title for category-3 on en language"
},
"tags": [
{
"id": 10,
"slug": "TAG-5",
"title": "Title for tag-5 on en language"
}
]
},
{
"id": 20,
"category_id": 4,
"status": "created",
"title": "Title for meal-10 on en language",
"description": "Description for meal-10 on en language",
"ingredients": [
{
"id": 17,
"slug": "INGREDIENT-7",
"title": "Title for ingredient-7 on en language"
}
],
"category": {
"id": 4,
"slug": "CATEGORY-4",
"title": "Title for category-4 on en language"
},
"tags": [
{
"id": 7,
"slug": "TAG-2",
"title": "Title for tag-2 on en language"
},
{
"id": 8,
"slug": "TAG-3",
"title": "Title for tag-3 on en language"
}
]
}
],
"links": {
"first": "http://localhost:8888/api/query?page=1",
"last": "http://localhost:8888/api/query?page=2",
"prev": "http://localhost:8888/api/query?page=1",
"next": null
},
"meta": {
"current_page": 2,
"from": 11,
"last_page": 2,
"path": "http://localhost:8888/api/query",
"per_page": "10",
"to": 13,
"total": 13
}
}
</pre>
