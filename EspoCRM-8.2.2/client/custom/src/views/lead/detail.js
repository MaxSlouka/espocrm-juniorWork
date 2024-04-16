define("custom:views/lead/detail", "views/detail", function (Dep) {
  return Dep.extend({
    setupActionItems: function () {
      Dep.prototype.setupActionItems.call(this);

      this.dropdownItemList.push({
        label: "Najít kontakty",
        name: "findContacts",
      });
    },

    actionFindContacts: function () {
      var email = this.model.get("emailAddress");

      if (!email) {
        Espo.Ui.warning("Žádný email nebyl nalezen pro tohoto vedoucího.");
        return;
      }

      this.ajaxPostRequest("Lead/action/findContacts", { email: email })
        .then(
          function (response) {
            if (response.length === 0) {
              Espo.Ui.warning(
                "Žádné kontakty s tímto emailem nebyly nalezeny."
              );
            } else {
              this.showContactsModal(response);
            }
          }.bind(this)
        )
        .catch(function (error) {
          Espo.Ui.error("Došlo k chybě při hledání kontaktů.");
          console.error(error);
        });
    },

    showContactsModal: function (contacts) {
      var message = contacts
        .map(function (contact) {
          return contact.name + " (" + contact.email + ")";
        })
        .join("<br>");

      Espo.Ui.alert(message, "Nalezené kontakty");
    },
  });
});
