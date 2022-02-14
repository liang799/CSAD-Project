paypal.Buttons({
                  style: {
                      shape: 'pill',
                      color: 'gold',
                      layout: 'horizontal',
                      label: 'subscribe'
                  },
                  createSubscription: function(data, actions) {
                    return actions.subscription.create({
                      /* Creates the subscription */
                      plan_id: 'P-7YF52428BY641674SMIEMUWI'
                    });
                  },
                  onApprove: function(data, actions) {
                    alert(data.subscriptionID); // You can add optional success message for the subscriber here
                  }
              }).render('#paypal-button-container-P-7YF52428BY641674SMIEMUWI'); // Renders the PayPal button

