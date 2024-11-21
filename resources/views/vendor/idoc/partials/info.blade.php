## Info

### This API uses the following error codes:

Error Code | Slug | Type | Meaning
---------- | ---- | ---- | -------
400 | bad_request | Bad Request | Your request sucks
401 | unauthorized | Unauthorized | Your API key is wrong or invlid
403 | forbidden | Forbidden | The data requested is hidden for real men with valid rights only
404 | not_found | Not Found | The specified resource/url-path could not be found
405 | method_not_allowed | Method Not Allowed | You tried to access a route with an invalid method
406 | not_acceptable | Not Acceptable | You requested a format that isn't available
410 | gone | Gone | The resource requested has been removed from our servers
422 | validation_failed | Unprocessible Entity | The form request is invalid.
429 | too_many_requests | Too Many Requests | You're going too fast! Slow down!
500 | server_error | Internal Server Error | We had a problem with our server. Try again later.
503 | service_unavailable | Service Unavailable | We're temporarially offline for maintanance. Please try again later.

