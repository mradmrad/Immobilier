/**
 * Created by Slimen-PC on 30/01/2017.
 */
(function () {

    var addressDOM = $('#sbc_tiersbundle_supplier_addresses');
    var contactDOM = $('#sbc_tiersbundle_supplier_contacts');
    var _countAddress = addressDOM.children().length;
    var _countContact = contactDOM.children().length;

    $('#addAddress').on('click', function (e) {
        var addressForm = addressDOM.attr('data-prototype');
        addressForm = addressForm.replace(/__name__/g, _countAddress);
        addressDOM.append(addressForm);
        _countAddress++;
    });

    $('#addContact').on('click', function (e) {
        var contactForm = contactDOM.attr('data-prototype');
        contactForm = contactForm.replace(/__name__/g, _countContact);
        contactDOM.append(contactForm);
        _countContact++;
    });
})();