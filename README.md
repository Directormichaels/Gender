# Gender
This is a gender check app. Albeit loosely written.....haha

This was done using the `genderize` API.
This is a simple API to predict the gender of a given name.

The request is made such:
```
https://api.genderize.io?name=Peter
```

The request will render a json response like the following:
```
{
  "name": "peter",
  "gender": "male",
  "probability": 0.99,
  "count": 165452
}
```
The probability indicates the certainty of the assigned gender. Basically the ratio of male to females. The count represents the number of data rows examined in order to calculate the response.
This API is also <strong>FREE!!!</strong> for up to 1000 names per day.

The API is available [here](www.genderize.io)
<br>
Take a look and tell me what you think.