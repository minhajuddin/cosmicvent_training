class ClientWorkout < ActiveRecord::Base
  validates_numericality_of :paid_amount
  validates_presence_of :trainer
  validates_presence_of :client_name 
end
