# Platte Basin Timelapse
#### Wordpress Theme

By Steven Speicher

This is the custom theme designed for the Platte Basin Timelapse project. It's probably best this is the only theme used, although child themes could be created from it.

Most site configuration and customization is done in inc/* files, not in Plugins, so, please, hang on to those.

[Flywheel](https://getflywheel.com/), an Omaha company specializing in Wordpress hosting servers our site for us. Call or email them with any questions.

They update WP core for us. And set up chaching and speed boost stuff.

This site should be faaast.

### Working On

1. Set up local dev environment. I like [VVV](https://github.com/Varying-Vagrant-Vagrants/VVV).
2. Get a copy of the database from admin or Flywheel.
3. Get a copy of Uploads directory.
4. Get a copy of Plugins directory.
5. Pull or clone WP theme from here.
6. If not set up yet, do the Set-up step blow.

**Do not commit to master branch** unless change is vetted. Work on feature or development branches.

### Set-up

Install all the things.

	npm install

	bower install

Then you must run grunt to build the stylesheets.

	grunt build

You can run a watch command to rebuild stylesheets at writing to file.

	grunt watch

### Deployment

Deployment is done through git automatically with [DeployHQ](https://www.deployhq.com/) and [Flywheel](https://getflywheel.com/). Check out this [help doc](https://getflywheel.com/help/can-use-git-publish-site-flywheel/) from Flywheel for additional instruction.