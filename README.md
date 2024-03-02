# gh_validationdummy

Just a dummy to showcase Extbase Validation for CRUD

This shows simple record creation and editing for a simple model ("Person").

There are two fields, "firstName" and "lastName" that are the only editable fields.

There is a third "special" field however. This can be created in the backend only, and is mandatory.

In the frontend editing, that "special" field should never be touchable.

If you simply omit the property in your `<f:form>` section of the frontend creation/editing part, the validation ("NotEmpty") still kicks in, and will prevent you from persisting or even inspecting any element, where "special" is not set.

If you pass `@IgnoreValidation("person")` to the controller's `updateAction` or `createAction` you would completely disable any validation of the object (not good). Of course, you could validate the object within the controller action completely manually in that case.

If you would use `@Validate(...)` with a custom validation instead, this would always be executed on top of the domain model validation - so you could only add extra validation, and not bypass the existing one.

The solution that this extension show-cases is a "DTO" ("Data transfer object") way. Here, a small variant of the main domain model is created, without the `special` property. It only holds the properties that you really edit on the frontend.

Inside the actions, the DTO is populated with the original domain model input, and before persisting, the real object is retrieved and filled with the data of the DTO.

Even though this might feel like much redundancy, it really helps you to create a distinct model of a frontend-editable domain model. You might even use a DTO as your base, and let the "normal" Domain Model extend from both your DTO and the `AbstractEntity` from extbase, so that only your extbase domain model would hold all the data that is not available to the frontend. 

This is just a very quick and dirty example, hope it helps anyone.

# How to use

* Install the extension (i.e. via Packagist `garvinhicking/gh-validationdummy`) or copy+paste it to your `packages` structure (or retrieve via GIT)
* Add the TypoScript template to your root site
* Create two pages like "DTO" and "Validator"
* Place the corresponding "ValidationDummy: DTO" on your "DTO" page, and "ValidationDummy: Validator" on the "Validator" page
* Open the frontend, create data via the links provided of the plugins
* You can also insert records in the backend (inside a SysFolder) (so that you have an initial list view)




