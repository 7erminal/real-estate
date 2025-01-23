import { VALUES } from "./../values"

const baseUrl = `${VALUES.backendBaseEndpoint}`;

// CATEGORY ENDPOINT
const api = `${baseUrl}/api`;


export const ROUTES = {
    
   ///////// THIRD PARTY ENDPOINTS /////
   // CUSTOMER PORTAL
//    customerPortal: customerPortalUrl,
    // GET CUSTOMER SUBSCRIPTION
    // getCustomerSubscription: (leadId) => `${customersApiEndPointBase}/subscription/${leadId}`, // Append lead ID
    // GET CUSTOMER SUBSCRIPTION WITH ACCOUNT NUMBER
    // getCustomerSubscriptionWithAccountNumber: (accountNumber) => `${customersApiEndPointBase}/subscription/accountnumber?accountnumber=${accountNumber}`, // Account number should be appended

    // ADD ITEM
    addItem: `${api}/admin2/add-item`,

    // ADD CATEGORY
    addCategory: `${api}/admin2/postCategory`,

    // ADD SUB CATEGORY
    addSubCategory: `${api}/admin2/postSubCategories`,

    // GET CATEGORIES
    getCategories: `${api}/admin2/get-categories`,

    // EDIT SUB CATEGORY
    editSubCategory: `${api}/admin2/edit-sub-category`,

    // DELETE SUB CATEGORY
    deleteSubCategory: `${api}/admin2/delete-sub-category`,

    // EDIT CATEGORY
    editCategory: `${api}/admin2/edit-category`,

    // DELETE CATEGORY
    deleteCategory: `${api}/admin2/delete-category`,
}





