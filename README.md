# PHP-Weather-Forecast

# Description

# PHP Code:

The PHP code begins by initializing an empty string variable named $weather. This variable will hold the weather forecast information retrieved from the website.

It checks if the GET parameter named 'city' is set using the isset($_GET['city']) condition. If the 'city' parameter is present in the URL, it proceeds to fetch the weather information.

If the 'city' parameter is set, the code removes any spaces from the city name and constructs a URL to fetch the weather forecast. The URL is constructed using the city name and the "http://www.weather-forecast.com/locations/" website.

It then uses the get_headers() function to check if the URL is valid and if the city information is available on the website. If a '404 Not Found' header is detected, it means the city information is not available on the website, and an error message is displayed.

If the URL is valid and the city information is available, it uses the file_get_contents() function to fetch the contents of the webpage. The webpage contains weather forecast information.

The fetched content is processed using string manipulation functions (explode()). It first splits the content to extract the relevant weather forecast information and assigns it to the $weather variable.

If the weather information is successfully extracted, it is stored in the $weather variable. If not, error messages are displayed indicating either the weather information was not found or there was a problem fetching the data.

# HTML and CSS:

The HTML structure consists of a form where users can input a city name and submit the form to get weather information.

There are also Bootstrap styles applied to the form and the weather information display area.

The JavaScript libraries (jQuery, Popper.js, and Bootstrap) are included at the end to provide additional functionality and styling to the webpage.

# JavaScript and Styles:

Inline CSS styles are used to set the background image and adjust the styling of various elements on the page.

JavaScript libraries (jQuery, Popper.js, and Bootstrap) are included to enhance the user interface and responsiveness of the webpage.

# Displaying Weather Information:

The PHP code snippet inside the <div id="weather"> section checks if the $weather variable has weather information. If it does, a Bootstrap success alert is displayed containing the weather forecast information.
