## Lärrum custom api

## Dependencies
1. File Upload Types by WPForms, Add these manually.
   
        Description = glb
        MIME Type = application/octet-stream
        Extension = .glb

        Description = gltf
        MIME Type = text/plain
        Extension = .gltf

        Description = usdz
        MIME Type = application/zip
        Extension = .usdz

2. Classic Editor  
        Activates classic editor in wordress

3. Advanced Custom Fields PRO, import acf-export-2022-06-01.json to get required field group.

## TODO
Frontend:
1. Implement desktop design.
2. Implement support for usdz format.
3. Add styling on components so It will look like the design.
4. Look through swipe functionality and fine tune behaviour.
5. Implement check if no category is set, show nothing on the front-end.
6. Fix IOS/Safari issues.

Backend:
1. Look over ACF-plugin and modify.
2. Add custom rules and add validation.
3. Make a guide for the user on how to create a post.