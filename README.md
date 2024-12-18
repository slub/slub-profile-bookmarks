# TYPO3 Extension `slub_profile_bookmarks`

[![TYPO3](https://img.shields.io/badge/TYPO3-11-orange.svg)](https://typo3.org/)

SLUB profile service bookmark extension for TYPO3.

## 1 Usage

### 1.1 Installation using Composer

The recommended way to install the extension is using [Composer][1].

Run the following command within your Composer based TYPO3 project:

```
composer require slub/slub-profile-bookmarks
```

## 2 API

This extension communicates with another system to provide bookmarks.

### 2.1 Routes

Please check the routes' configuration. You have to set the matching page (limitToPages). If not the routes will not work properly.

### 2.2 Bookmarks

A list of bookmarks from a given user.

- **Uri DDEV local:** https://ddev-slub-profile-service.ddev.site/merkliste/###USER_ID###
- **Uri general:** https://###YOUR-DOMAIN###/merkliste/###USER_ID###

#### 2.2.1 Extension configuration

- **Uri:** Address or domain to request the data. The uri has to begin with "https://". If you connect to another ddev container, please use "https://ddev-###YOUR-CONTAINER###-web".
- **Argument identifier:** When you request data from this extension to the bookmark api (external extension), you use additional parameters too. These parameters are wrapped with the "argument identifier". The default value is "tx_slubfindbookmarks_bookmarklist". Change only if you know what you do.

[1]: https://getcomposer.org/


