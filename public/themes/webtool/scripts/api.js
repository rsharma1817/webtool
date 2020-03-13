/* Define API endpoints once globally */
$.fn.api.settings.api = {
    'frame data'        : '/report/frame/data/{id}',
    'frame show'        : '/report/frame/showFrame',
    'domain list'       : '/api/data/domain/lookupData',
    'create user'       : '/create',
    'add user'          : '/add/{id}',
    'follow user'       : '/follow/{id}',
    'search'            : '/search/?query={value}'
};