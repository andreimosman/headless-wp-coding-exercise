# WayBeyondLabs Breweries Plugin
Plugin to create custom post type for breweries and wp-cli commands to import breweries from the Open Brewery API.

# Local installation

## Requirements
- docker
- docker-compose

## Step 01: environment variables
Copy sample.env to .env and customize-it

## Step 02: First run
Just run the following command at the root folder of the project

```./first-run-on-localhost.sh```

## Step 03: Alias
The line bellow create an alias to run wp inside the container: 

```alias wp="docker compose run --rm wp-cli"```

## Step 04: Importing data using the plugin
Please wait 2 minutes before run the command bellow in order to ensure everything is running well.

```wp breweries import``` (if you created the alias)

or 

```docker compose run --rm wp-cli breweries import``` (if not)

## TODO: redirect 
Redirect / site to anywhere else, once it's headless
