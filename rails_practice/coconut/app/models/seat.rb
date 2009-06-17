class Seat < ActiveRecord::Base
  def validate
    if baggage > Flight.find(flight_id).baggage_allowance
      errors.add_to_base("you have too much baggage")
      end
     end
end
